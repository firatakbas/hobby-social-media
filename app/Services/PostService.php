<?php

namespace App\Services;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;

class PostService
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    public function all(): LengthAwarePaginator
    {
        return $this->postRepository->allPosts();
    }

    public function create(array $data): Post
    {
        return $this->postRepository->create([
            'user_id'       => auth()->id(),
            'postable_type' => $data['postable_type'],
            'postable_id'   => $data['postable_id'],
            'content'       => $data['content'],
        ]);
    }

    public function delete(Post $post)
    {
        $this->postRepository->delete($post);
    }

    public function getGroupPosts(int $groupId)
    {
        return $this->postRepository->getGroupPosts($groupId);
    }

    public function getUserPosts(int $userId)
    {
        return $this->postRepository->getUserPosts($userId);
    }
}
