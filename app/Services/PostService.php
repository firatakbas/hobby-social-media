<?php

namespace App\Services;

use App\Contracts\Repositories\PostRepository;
use App\Models\Post;
use App\Models\User;

class PostService
{
    public function __construct(private PostRepository $postRepository)
    {
    }

    public function allUserPosts()
    {
        return $this->postRepository->allUserPosts();
    }

    public function createForUser(array $data)
    {
        $this->postRepository->create([
            'user_id'       => auth()->id(),
            'postable_type' => User::class,
            'postable_id'   => auth()->id(),
            'content'       => $data['content'],
        ]);
    }

    public function delete(Post $post)
    {
        $this->postRepository->delete($post);
    }
}
