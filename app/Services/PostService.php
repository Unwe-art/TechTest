<?php

namespace App\Services;

use App\Models\Posts;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class PostService
{
    public function addPost(array $data)
    {
        $post = [
            'user_id' => Auth::id(),
            'title' => $data['title'],
            'author_name' => (User::where('id', Auth::id())->first())['name']
        ];
        Posts::create($post);

        return redirect('/dashboard');

    }

    public function getAllPosts()
    {
        return view('dashboard')->with('posts', Posts::all());
    }

    public function getPostByid($postId)
    {
        $post = Posts::where('id', $postId)->first();
        return view('viewPost', ['creator' => Auth::id() == $post['user_id'], 'post' => $post]);
    }

    public function deletePost($data)
    {
        Posts::destroy($data['id']);
        return redirect('/dashboard');
    }

    public function updatePost($data)
    {

        Posts::where('id', $data['id'])->update([
            'title' => $data['title'],
        ]);
        return redirect('/dashboard');
    }
}
