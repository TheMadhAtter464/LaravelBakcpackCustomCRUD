<?php

namespace Backpack\Base\app\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;

class postController extends Controller
{

    public function __construct()
    {
        $this->middleware(backpack_middleware());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexPost()
    {
      $posts = Post::latest()->paginate(5);
      return view ('posts.index', compact ('posts'))->with('i',(request()->input('page',1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPost()
    {
      $tags = DB::table('tags')->get(); //--category
      return view('posts.create', ['tags' => $tags]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storePost(Request $request)
    {
      request()->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => 'required',
        'tags' => 'required',
      ]);

      $posts = new Post;

      //--image
      $image = Input::get('image');
      $contents = file_get_contents($image);
      $name = substr($image, strrpos($image, '/')+1);
      Storage::put('images/'.$name, $contents);
      //--image
      $posts->title=$request->title;
      $posts->body=$request->body;
      $posts->image=$request->image;
      $posts->save();

      $posts->tags()->sync($request->tags, false);

      return view ('posts.index')->with('success','Post created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $posts = Post::find($id);
      return view ('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $posts = Post::find($id);
      $tags = Tag::all();
      return view('posts.edit', compact('posts', 'id'))->withTags($tags);
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
      request()->validate([
        'title' => 'required',
        'body' => 'required',
        'image' => 'required',
        'tags' => 'required',
      ]);

      $posts = Post::find($id);
      //--image
      $image = Input::get('image');
      $contents = file_get_contents($image);
      $name = substr($image, strrpos($image, '/')+1);
      Storage::put('images/'.$name, $contents);
      //--image
      Post::find($id)->update($request->all());
      $posts->tags()->sync($request->tags);
      return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyPost($id)
    {
      Post::find($id)->delete();
      return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
}
