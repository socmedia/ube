<?php

namespace Modules\Post\Http\Controllers;

use App\Services\PostService;
use App\Traits\FileHandler;
use App\Utillities\Generate;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Modules\Post\Entities\Post;
use Modules\Post\Entities\PostCategory;
use Modules\Post\Entities\PostMedia;
use Modules\Post\Entities\PostStatus;
use Modules\Post\Entities\PostType;

class BlogController extends Controller
{
    use FileHandler;

    public $categories, $types, $statuses, $pluckCategories, $pluckTypes, $pluckStatuses;

    /**
     * Class constructor.
     */
    public function __construct(
        PostCategory $postCategory,
        PostType $postType,
        PostStatus $postStatus
    ) {
        $categories = $postCategory->get(['id', 'name']);
        $types = $postType->where('name', 'blog')->first(['id', 'name']);
        $statuses = $postStatus->get(['id', 'name']);

        $this->categories = $categories;
        $this->types = $types;
        $this->statuses = $statuses;

        $this->pluckCategories = implode(',', $categories->pluck('id')->toArray());
        $this->pluckTypes = implode(',', $types->pluck('id')->toArray());
        $this->pluckStatuses = implode(',', $statuses->pluck('id')->toArray());
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('post::blog.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('post::blog.create', [
            'categories' => $this->categories,
            'types' => $this->types,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $status = null;

        if ($request->status == 'publish') {
            $status = 2;
        } else if ($request->status == 'draft') {
            $status = 1;
        } else {
            return redirect()->back()->with('failed', 'Status dengan nama ' . $request->status . ' tidak tersedia.');
        }

        $request->validate([
            'title' => 'required|max:191|' . Rule::unique('posts', 'title'),
            'slug' => 'required|max:191|' . Rule::unique('posts', 'slug_title'),
            'tags' => 'required|max:191',
            'subject' => 'required|min:10|max:191',
            'description' => 'required',
            'category' => 'required|in:' . $this->pluckCategories,
            'thumbnail' => 'required|max:256|mimes:png,jpg,jpeg|image',
        ]);

        if ($request->file('thumbnail')) {
            $thumbnail = $this->uploadMedia($request->file('thumbnail'), 'thumbnail', now()->toDateString());
        }

        $post = Post::create([
            'id' => Generate::ID(16),
            'title' => $request->title,
            'slug_title' => $request->slug,
            'category_id' => $request->category,
            'status_id' => $status,
            'type_id' => $this->types->id,
            'subject' => $request->subject,
            'description' => $request->description,
            'tags' => $request->tags,
            'reading_time' => PostService::generateReadingTime($request->description),
            'number_of_views' => 0,
            'number_of_shares' => 0,
            'author' => auth()->id(),
        ]);

        PostMedia::create([
            'posts_id' => $post->id,
            'type' => 'thumbnail',
            'media_path' => $thumbnail,
            'position' => 1,
        ]);

        return redirect()->route('adm.post.blog.index')->with('success', 'Blog berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Post $post, $id)
    {
        return view('post::blog.edit', [
            'post' => $post->findOrFail($id),
            'categories' => $this->categories,
            'types' => $this->types,
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $blog = Post::findOrFail($id);

        $status = null;

        if ($request->status == 'publish') {
            $status = 2;
        } else if ($request->status == 'draft') {
            $status = 1;
        } else {
            return redirect()->back()->with('failed', 'Status dengan nama ' . $request->status . ' tidak tersedia.');
        }

        $request->validate([
            'title' => 'required|max:191|' . Rule::unique('posts', 'title')->ignore($blog->id),
            'slug' => 'required|max:191|' . Rule::unique('posts', 'slug_title')->ignore($blog->id),
            'tags' => 'required|max:191',
            'subject' => 'required|min:10|max:191',
            'description' => 'required',
            'category' => 'required|in:' . $this->pluckCategories,
            'thumbnail' => 'nullable|max:256|mimes:png,jpg,jpeg|image',
        ]);

        if ($request->file('thumbnail')) {
            $thumbnail = $this->uploadMedia($request->file('thumbnail'), 'thumbnail', now()->toDateString());

            if ($blog->thumbnail) {

                $origin = request()->headers->get('origin') . '/storage/';
                $path = str_contains($blog->thumbnail->media_path, $origin)
                ? substr($blog->thumbnail->media_path, strlen($origin))
                : $blog->thumbnail->media_path;
                Storage::delete('public/' . $path);

                $blog->thumbnail->update([
                    'media_path' => $thumbnail,
                ]);

            } else {

                PostMedia::create([
                    'posts_id' => $blog->id,
                    'type' => 'thumbnail',
                    'media_path' => $thumbnail,
                    'position' => 1,
                ]);

            }
        }

        $blog->update([
            'title' => $request->title,
            'slug_title' => $request->slug,
            'category_id' => $request->category,
            'status_id' => $status,
            'type_id' => $this->types->id,
            'subject' => $request->subject,
            'description' => $request->description,
            'tags' => $request->tags,
            'reading_time' => PostService::generateReadingTime($request->description),
        ]);

        return redirect()->route('adm.post.blog.index')->with('success', 'Blog berhasil diperbarui.');
    }

    public function check(Request $request)
    {
        $res = [
            'status' => 200,
            'message' => 'Success',
        ];

        $rules = [
            'title' => 'unique:posts,title',
            'slug' => 'unique:posts,slug_title',
        ];

        if ($request->title) {
            $req = array_merge($request->all(), ['slug' => slug($request->title)]);
            $validator = Validator::make($req, $rules);
            $res['response'] = ['slug' => slug($request->title)];

            if ($validator->fails()) {
                $res['status'] = 422;
                $res['message'] = 'Validation fails';

                foreach (json_decode($validator->messages()) as $i => $v) {
                    $res['response']['errors'][$i] = reset($v);
                }
            }

            return response()->json($res, $res['status']);
        }

        if ($request->slug) {
            $validator = Validator::make($request->all(), array_slice($rules, -1, 1));

            if ($validator->fails()) {
                $res['status'] = 422;
                $res['message'] = 'Validation fails';

                foreach (json_decode($validator->messages()) as $i => $v) {
                    $res['response']['errors'][$i] = reset($v);
                }
            }

            return response()->json($res, $res['status']);
        }

        return abort(404);
    }
}