<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Models\Post;
use App\Models\User;

class PostRepository implements PostRepositoryInterface
{
    public function allPosts()
    {
        return Post::where('postable_type', User::class)->orderBy('id', 'desc')->paginate(20);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function delete(Post $post)
    {
        $post = $this->getById($post->id);
        return $post->delete();
    }

    public function update(array $data)
    {
        // TODO: Implement update() method.
    }

    public function getById(int $id)
    {
        return Post::where('id', $id)->first();
    }
}
