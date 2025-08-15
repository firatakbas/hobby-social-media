<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post\PostStoreRequest;
use App\Models\Group;
use App\Models\Post;
use App\Models\User;
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

    public function store(PostStoreRequest $request, ?Group $group = null)
    {
        $data = $request->validated();

        if ($group) {
            $data['postable_type'] = Group::class;
            $data['postable_id'] = $group->id;
        } else {
            $data['postable_type'] = User::class;
            $data['postable_id'] = auth()->id();
        }

        $this->postService->create($data);

        if ($group) {
            return redirect()->back();
        } else {
            return redirect()->route('feed.index')->with('success', 'Gönderi Paylaşıldı');
        }
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
