<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function index(): View
    {
        $posts = $this->postService->allUserPosts();
        return view('home.index', compact('posts'));
    }
}
