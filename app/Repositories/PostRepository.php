<?php

namespace App\Repositories;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{
    public function allPosts()
    {
        return Post::with(['postable', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function create(array $data)
    {
        return Post::create($data);
    }

    public function delete(Post $post)
    {
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

    public function getGroupPosts(int $groupId)
    {
        return Post::where('postable_type', \App\Models\Group::class)
            ->where('postable_id', $groupId)
            ->with(['user', 'postable'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }

    public function getUserPosts(int $userId)
    {
        return Post::where('postable_type', \App\Models\User::class)
            ->where('postable_id', $userId)
            ->with(['user', 'postable'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
    }
}
