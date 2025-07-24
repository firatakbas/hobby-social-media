<?php

namespace App\Contracts\Repositories;

use App\Models\Post;

interface PostRepository
{
    public function allUserPosts();

    public function create(array $data);

    public function delete(Post $post);
}
