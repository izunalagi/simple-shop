<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create(Request $request)
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
          {
          // $filename = uniqid('img_').time() . '.' .
          $file = $request->file('photo');
          $filename = time() . '.' . $file->getClientOriginalExtension();

          $photo_path = $request->file('photo')->storeAs('public/posts',$filename);
          //menghapus string 'public/' karena dapat menyulitkan pemanggilan di blade.

          $photo_path = str_replace('public/','',$photo_path);
          $data = [
          'title' => $request->title,
          'description' => $request->description,
          'photo' => $photo_path
          ];
          $post = Post::create($data);
          return redirect()->route('post.index');

          };
        

        $post = Post::create([
            'title' => $data['title'],
            'description' => $data['description'],
       
        ]);

        return redirect()->route('post.index');
    }

    public function edit(Request $request, $id)
    {
        $post = Post::find($id);
        return view('post.update',compact($post));
    }

    public function update(Request $request, $id)
    {
       $file = $request->file('photo');
       $filename = time() . '.' .
       $file->getClientOriginalExtension();

       $photo_path = $request->file('photo')->storeAs('public/posts',$filename);
       $photo_path = str_replace('public/','',$photo_path);

        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->photo = $photo_path;
        $post->save();

        return redirect()->route('post.index');
    }

    public function destroy($id)
    {
    $post = Post::find($id);
    try {
    Storage::delete('public/'.$post->photo);
    $post->delete();

    } catch (\Throwable $th){

    }
    $post->delete();

    return redirect()->route('post.index');
    }
}
