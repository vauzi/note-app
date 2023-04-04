<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        try {
            // show post data
            $post = Post::query()->get();
            return response()->json([
                'success'   => true,
                'message'   => 'Post was successfully',
                'data'      => $post
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function store(Request $request)
    {
        // validatioan data body
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ]);

        // check if validation is fails
        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'error'     => $validator->errors()
            ], 400);
        }

        try {
            // create a new post data
            $post = Post::query()->create([
                'title' => $request->title,
                'body'  => $request->body
            ], 201);
            return response()->json([
                'success' => true,
                'message' => 'Post created successfully',
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            // show one data post wheer id post
            $post = Post::query()->find($id);

            // check if post exists
            if (!$post) return response()->json([
                'success' => false,
                'message' => 'post not found',
            ], 404);

            return response()->json([
                'success' => true,
                'data' => $post
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function update(Request $request, $id)
    {
        // validatioan data body
        $validator = Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ]);

        // check if validation is fails
        if ($validator->fails()) {
            return response()->json([
                'success'   => false,
                'error'     => $validator->errors()
            ], 400);
        }
        try {
            // show one data post wheer id post
            $post = Post::query()->find($id);

            // check if post exists
            if (!$post) return response()->json([
                'success' => false,
                'message' => 'post not found',
            ], 404);

            // update post
            $post->update([
                'title' => $request->title,
                'body'  => $request->body
            ]);

            return response()->json([
                'success' => true,
                'message' => 'post updated successfully',
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {

            // post one data request
            $post = Post::query()->find($id);

            // check if post exists
            if (!$post) return response()->json([
                'success' => false,
                'message' => 'post not found',
            ], 404);

            // delete post
            $post->delete();

            return response()->json([
                'success' => true,
                'message' => 'Post deleted successfully'
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
