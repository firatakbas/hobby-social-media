<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    public function storeForUser(PostStoreRequest $request)
    {
        $this->postService->createForUser($request->validated());
        return redirect()->back();
    }

    public function storeForGroup(PostStoreRequest $request)
    {
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
