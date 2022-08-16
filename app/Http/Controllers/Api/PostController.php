<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends HandleController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id', 'asc')->get();
        return PostResource::collection($post);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'content' => 'required',
            'is_published' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $post = Post::create($input);
        return $this->handleResponse(new PostResource($post), 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if(is_null($post)){
            return $this->handleError('Post Not Found');
        }
        return $this->handleResponse(new PostResource($post), 'Post returned');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required',
            'image' => 'required',
            'content' => 'required',
            'is_published' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->handleError($validator->errors());
        }

        $post = Post::findOrFail($id);
        $post->update([
            'name' => $input['name'],
            'description' => $input['description'],
        ]);

        return $this->handleResponse(new PostResource($post), 'Post successfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return $this->handleResponse([],'Post Deleted');
    }
}
