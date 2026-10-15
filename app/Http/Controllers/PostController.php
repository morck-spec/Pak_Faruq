<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    /**
     * index
     *
     * @return Response
     */
    public function index(): Response
    {
        //get all posts from database
        $posts = Post::latest()->get();

        //render with data "posts"
        return Inertia::render('Post/Index', [
            'posts' => $posts
        ]);
    }

    /**
     * create
     *
     * @return Response
     */
    public function create(): Response
    {
        return Inertia::render('Post/Create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        //create post
        Post::create([
            'title'   => $request->title,
            'content' => $request->content,
        ]);

        return Redirect::route('posts.index')->with('message', 'Data Berhasil Disimpan!');
    }

    /**
     * edit
     *
     * @param Post $post
     * @return Response
     */
    public function edit(Post $post): Response
    {
        return Inertia::render('Post/Edit', [
            'post' => $post
        ]);
    }

    /**
     * update
     *
     * @param Request $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        //set validation
        $request->validate([
            'title'   => 'required',
            'content' => 'required',
        ]);

        //update post
        $post->update([
            'title'   => $request->title,
            'content' => $request->content
        ]);

        return Redirect::route('posts.index')->with('message', 'Data Berhasil Diupdate!');
    }

    /**
     * destroy
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        //delete post
        $post->delete();

        return Redirect::route('posts.index')->with('message', 'Data Berhasil Dihapus!');
    }
}

