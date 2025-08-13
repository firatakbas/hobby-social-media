<?php

namespace App\Services;

use App\Contracts\Repositories\PostRepositoryInterface;
use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Void_;

class PostService
{
    public function __construct(private PostRepositoryInterface $postRepository)
    {
    }

    public function all(): LengthAwarePaginator
    {
        return $this->postRepository->allPosts();
    }

    /**
     * Herkese açık kullanıcı gönderi(postu) oluşturur
     *
     * @param array $data
     *
     * @return Post
     */
    public function createForUser(array $data)
    {
        return $this->postRepository->create([
            'user_id'       => auth()->id(),
            'postable_type' => Group::class,
            'postable_id'   => auth()->id(),
            'content'       => $data['content'],
        ]);
    }

    /**
     * Herkese açık grup gönderi(postu) oluşturur
     *
     * @param array $data
     *
     * @return Post
     */
    public function createForGroup(array $data): Post
    {
        return $this->postRepository->create([
            'user_id'       => auth()->id(),
            'postable_type' => Group::class,
            'postable_id'   => auth()->id(),
            'content'       => $data['content'],
        ]);
    }

    public function delete(Post $post)
    {
        $this->postRepository->delete($post);
    }
}
