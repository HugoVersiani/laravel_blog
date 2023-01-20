<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Post_has_tag;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $posts = Post::orderBy('updated_at', 'DESC')->with('tags')
                                                    ->get();
       
        return view('blog.index')->with(compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        return view('blog.create')->with('tags', Tag::orderBy('updated_at', 'DESC')->get());;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=>'required',
            'description'=>'required',
            'tags'=>'required',
            'image'=>'required|mimes:jpg,png,jpeg|max:5048'
        ]);
      
        $tags = $data['tags'];
        
        $newImageName = uniqid() . '-' . $request->title . '.' . 
        $request->image->extension();
        $request->image->move(public_path('images'), $newImageName);

        $post = Post::create([
            'title'=>$request->input('title'),
            'description' => $request->input('description'),
            'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' =>  $newImageName,
            'user_id' => auth()->user()->id
        ]);

      

        $post->tags()->attach($tags);
       
        return redirect('/blog',)->with('message_red', 'Postagem postada com sucesso!');

    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

    public function show($slug)
    {
        
        return view('blog.show')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $slug)
    {
        Post::where('slug', $slug)
            ->update([
                'title'=>$request->input('title'),
                'description' => $request->input('description'),
                'slug'=>SlugService::createSlug(Post::class, 'slug', $request->title),
                'user_id' => auth()->user()->id
            ]);

            return redirect('/blog')->with('message_red', 'Postagem editada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  id  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message_black', 'Postagem excluída! :c');
    }
}
