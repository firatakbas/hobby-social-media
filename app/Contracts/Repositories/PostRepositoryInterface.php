<?php

namespace App\Contracts\Repositories;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function allPosts();

    public function create(array $data);

    public function update(array $data);

    public function delete(Post $post);

    public function getById(int $id);
}
