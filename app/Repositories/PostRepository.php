<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepository as PostRepositoryContract;
use App\Models\Post;
use App\Models\User;

class PostRepository implements PostRepositoryContract
{
    public function allUserPosts()
    {
        return Post::where('postable_type', User::class)->orderBy('id', 'desc')->get();
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function delete(Post $post)
    {
        return $post->delete();
    }
}
