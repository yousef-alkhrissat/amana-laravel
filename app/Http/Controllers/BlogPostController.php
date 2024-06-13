<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogPost;
use App\Http\Requests\UpdateBlogPostRequest;
use App\Http\Requests\StoreBlogPostRequest;
class BlogPostController extends Controller
{
    public function findAll(Request $request)
    {
        try {
            return  BlogPost::all();
        } catch (\Throwable $th) {
            $response=['msg'=>$th->getMessage(),'status'=>400];
            return response($response, 400);
        }
    }
    public function find(Request $request, $id)
    {
        try {
            return  BlogPost::where('id', '=', $id)->firstOrFail();
        } catch (\Throwable $th) {
            return ;
        }
    }
    public function update(UpdateBlogPostRequest $request, $id)
    {
        try {
            $response=BlogPost::where('id', '=', $id)->firstOrFail();
            $response->fill($request->input())->save();
            return  $response;
        } catch (\Throwable $th) {
            return \response($th->getMessage(), 400);
        }
    }
    public function delete($id)
    {
        try {
            BlogPost::where('id', '=', $id)->delete();
            return;
        } catch (\Throwable $th) {
            return \response($th->getMessage(), 400);
        }
    }
    public function create(StoreBlogPostRequest $request)
    {
        try {
            $body = $request->all();
            $response = BlogPost::create($body);
            return  $response;
        } catch (\Throwable $th) {
            return \response($th->getMessage(), 400);
        }
    }
}
