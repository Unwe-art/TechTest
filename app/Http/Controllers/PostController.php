<?php

namespace App\Http\Controllers;

use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\Response;

class PostController extends Controller
{
    /**
     * @param Request $request
     */
    public function addPostAction(Request $request)
    {
        $authService = new PostService();
        $data = [
            'title' => 'required',
        ];

        $request->validate($data);
        return $authService->addPost($request->all(array_keys($data)));
    }
    /**
     * @param Request $request
     * @return View
     */
    public function getAllPostsAction(Request $request)
    {
        $authService = new PostService();

        return $authService->getAllPosts();
    }

    /**
     * @param $postId
     * @return View
     */
    public function getPostByIdAction($postId)
    {
        $authService = new PostService();
        return $authService->getPostByid($postId);
    }
    /**
     * @param Request $request
     */
    public function deletePostAction(Request $request)
    {
        $authService = new PostService();
        return $authService->deletePost($request->all('id'));
    }

    /**
     * @param Request $request
     */
    public function updatePostAction(Request $request)
    {
        $authService = new PostService();

        $data = [
            'id'=>'required',
            'title' => 'required',
        ];

        $request->validate($data);
        return $authService->updatePost($request->all(array_keys($data)));

    }
}
