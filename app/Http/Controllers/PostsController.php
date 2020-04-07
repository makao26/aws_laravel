<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use Storage;

class PostsController extends Controller
{
  public function add()
  {
      return view('post.create');
  }

  public function create(Request $request)
  {
      $post = new Post;
      $form = $request->all();
      $image = $request->file('image');
      $path = Storage::disk('s3')->putFile('', $image, 'public');
      $post->image_path = Storage::disk('s3')->url($path);
      $post->save();
      return redirect('/create');
  }
}
