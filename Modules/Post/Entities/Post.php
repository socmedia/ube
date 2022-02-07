<?php

namespace Modules\Post\Entities;

use App\Contracts\DatabaseTable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Schema;

class Post extends Model
{
    use HasFactory, SoftDeletes, DatabaseTable;

    /**
     * Define this table is not using auto_increment
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * Define id data type is a string
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Cast post id
     *
     * @var array
     */
    protected $casts = [
        'id' => 'string',
    ];

    protected $with = [
        'category:id,name',
        'thumbnail:id,posts_id,media_thumbnail,media_path',
        'status:id,name',
        'type:id,name',
        'writer:id,name',
    ];

    protected $withCount = [
        'comments',
    ];

    /**
     * Define fillable column in the post table
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'slug_title',
        'category_id',
        'status_id',
        'type_id',
        'subject',
        'description',
        'tags',
        'reading_time',
        'number_of_views',
        'number_of_shares',
        'author',
    ];

    /**
     * Define for post factory
     *
     * @return void
     */
    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\PostFactory::new ();
    }

    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  array $request
     * @return void
     */
    public static function filters(array $request)
    {
        $posts = static::query();

        // Check if props below is true/not empty
        if ($request['search']) {

            // Search query
            $posts->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request['search'] . '%')
                    ->orWhere('slug_title', 'like', '%' . $request['search'] . '%')
                    ->orWhere('subject', 'like', '%' . $request['search'] . '%')
                    ->orWhere('tags', 'like', '%' . $request['search'] . '%');
            });

        }

        // Check if props below is true/not empty
        if ($request['category']) {

            // Filter category by category name
            $posts->whereHas('category', function ($query) use ($request) {
                $query->where('slug_name', $request['category']);
            });
        }

        // Check if props below is true/not empty
        if ($request['type']) {
            // Filter type by type name
            $posts->whereHas('type', function ($query) use ($request) {
                $query->where('slug_name', $request['type']);
            });
        }

        // Check if props below is true/not empty
        if ($request['status']) {
            // Filter status by status name
            $posts->whereHas('status', function ($query) use ($request) {
                $query->where('slug_name', $request['status']);
            });
        }

        // Check if props below is true/not empty
        if ($request['sort'] && $request['order']) {
            $columns = Schema::getColumnListing('posts');

            // Check if column is exist in database table column
            // Handle errors column not found
            if (in_array($request['sort'], $columns)) {

                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($request['order'] == 'asc' || $request['order'] == 'desc') {
                    $posts->orderBy($request['sort'], $request['order']);
                }

            } else {
                // If column found, will return empty array
                return $posts;
            }
        } else {

            // By default, the data results will be order by
            // created_at = desc
            $posts->orderBy('created_at', 'desc');
        }

        return $posts;
    }

    /**
     * Category relation
     *
     * @return void
     */
    public function category()
    {
        return $this->belongsTo(PostCategory::class, 'category_id', 'id');
    }

    /**
     * Status relation
     *
     * @return void
     */
    public function status()
    {
        return $this->belongsTo(PostStatus::class, 'status_id', 'id');
    }

    /**
     * Type relation
     *
     * @return void
     */
    public function type()
    {
        return $this->belongsTo(PostType::class, 'type_id', 'id');
    }

    /**
     * Author relation
     *
     * @return void
     */
    public function writer()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * Medias relation
     *
     * @return void
     */
    public function medias()
    {
        return $this->hasMany(PostMedia::class, 'posts_id', 'id');
    }

    /**
     * Thumbnail
     *
     * @return void
     */
    public function thumbnail()
    {
        return $this->hasOne(PostMedia::class, 'posts_id', 'id')->where('type', 'thumbnail');
    }

    /**
     * Comments relation
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany(PostComment::class, 'posts_id', 'id');
    }
}