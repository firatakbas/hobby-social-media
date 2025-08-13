<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function index()
    {
        return view('post.store');
    }

    public function storeUser(PostStoreRequest $request)
    {
        $this->postService->createForUser($request->validated());
        return redirect()->route('home.index')->with('success', 'Gönderi Paylaşıldı');
    }

    public function storeGroup(PostStoreRequest $request)
    {
        $this->postService->createForGroup($request->validated());
        return redirect()->back();
    }

    public function show(Post $post): View
    {
        return view('post.show', compact('post'));
    }

    public function destroy(Post $post)
    {
        $this->postService->delete($post);
        return redirect()->back();
    }
}
