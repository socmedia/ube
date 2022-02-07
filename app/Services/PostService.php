<?php

namespace App\Services;

use App\Utillities\Generate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Modules\Post\Entities\Post;

class PostService
{
    /**
     * Filter query before fetching data from resource
     *
     * @param  object $post
     * @param  array $filters
     * @return void
     */
    public static function filter(object $post, array $filters)
    {
        if (array_key_exists('kategori_post', $filters['filters'])) {
            if (array_key_exists('val', $filters['filters']['kategori_post']) && $filters['filters']['kategori_post']['val']) {
                $post->where('category_id', $filters['filters']['kategori_post']['val']);
            }
        }

        if (array_key_exists('jenis_post', $filters['filters'])) {
            if (array_key_exists('val', $filters['filters']['jenis_post']) && $filters['filters']['jenis_post']['val']) {
                $post->where('type_id', $filters['filters']['jenis_post']['val']);
            }
        }

        if (array_key_exists('status_post', $filters['filters'])) {
            if (array_key_exists('val', $filters['filters']['status_post']) && $filters['filters']['status_post']['val']) {
                $post->where('status_id', $filters['filters']['status_post']['val']);
            }
        }

        if (array_key_exists('search', $filters)) {
            if (array_key_exists('val', $filters['search']) && $filters['search']['val']) {
                $post->where(function (Builder $query) use ($filters) {
                    $query->where('title', 'like', '%' . $filters['search']['val'] . '%')
                        ->orWhere('subject', 'like', '%' . $filters['search']['val'] . '%')
                        ->orWhere('subject', 'like', '%' . $filters['search']['val'] . '%')
                        ->orWhere('description', 'like', '%' . $filters['search']['val'] . '%');
                });
            }
        }

        if (array_key_exists('author', $filters)) {
            if (array_key_exists('val', $filters['author']) && $filters['author']['val']) {
                $post->where('author', $filters['author']['val']);
            }
        }

        if (array_key_exists('tags', $filters)) {
            if (array_key_exists('val', $filters['tags']) && $filters['tags']['val']) {
                $post->where('tags', 'like', '%' . $filters['tags']['val'] . '%');
            }
        }

        if (array_key_exists('disetujui', $filters['filters'])) {
            if (array_key_exists('val', $filters['filters']['disetujui']) && $filters['filters']['disetujui']['val'] != null) {
                $post->whereRaw($filters['filters']['disetujui']['val'] == 'ya' ? '`approved_at` is not null' : '`approved_at` is null');
            }
        }

        return $post;
    }

    /**
     * Generate reading time by post description length
     * Normal reading time 130 word/min.
     *
     * @param  string $description
     * @return string reading time
     */
    public static function generateReadingTime(string $description): string
    {
        return round(str_word_count(strip_tags($description)) / 130, 1) . ' Menit';
    }

    /**
     * Remove all medias by specific post from storage
     *
     * @param  mixed $medias
     * @return void
     */
    public static function removeAllMedias($medias = [])
    {
        foreach ($medias as $media) {
            if ($media->media_type == 'image') {
                deleteImage($media->media_path);
            }

            if ($media->media_type == 'video') {
                deleteImage($media->media_thumbnail);
                deleteVideo($media->media_thumbnail);
            }
        }
    }

    /**
     * Handle thumbnail upload
     *
     * @param  Illuminate\Http\Request $request
     * @return string Image Url
     */
    public function uploadThumbnail($request): string
    {
        $tmp = $request->file('thumbnail');
        $file = [
            'path' => 'app/public/images/' . now()->toDateString(),
            'name' => Generate::ID() . '.' . $tmp->extension(),
        ];

        $path = storage_path($file['path'] . '/' . $file['name']);

        if (!Storage::exists('public/images/' . now()->toDateString())) {
            Storage::disk('images')->makeDirectory(now()->toDateString());
        }

        $thumbnail = Image::make($tmp->getRealPath());
        $thumbnail->resize(600, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $thumbnail->save($path, 90);
        return url('storage/images/' . now()->toDateString() . '/' . $file['name']);
    }

    public function handle($request)
    {
        switch ($request->category) {
            case 'blog':
                # code...
                break;

            default:
                return abort(404);
                break;
        }
    }

}