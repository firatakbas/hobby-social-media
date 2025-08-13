<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function index(): View
    {
        $posts = $this->postService->all();
        return view('home.index', compact('posts'));
    }
}
