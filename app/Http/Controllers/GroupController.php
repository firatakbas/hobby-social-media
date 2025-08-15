<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Services\PostService;

class GroupController extends Controller
{
    public function __construct(private PostService $postService)
    {
    }

    /**
     * Display a listing of the groups.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('groups.index');
    }

    /**
     * Display the specified group.
     *
     * @param  Group  $group
     * @return \Illuminate\View\View
     */
    public function show(Group $group)
    {
        $posts = $this->postService->getGroupPosts($group->id);
        return view('groups.show', compact('group', 'posts'));
    }

    /**
     * Display the settings form for the specified group.
     *
     * @param  Group  $group
     *
     * @return \Illuminate\View\View
     */
    public function settings(Group $group)
    {
        return view('groups.settings', compact('group'));
    }
}
