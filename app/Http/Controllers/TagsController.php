<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;

class TagsController extends Controller
{
    public function index() {
        
        return view('blog.tags')->with('tags', Tag::orderBy('id', 'DESC')->get());;
    }

    public function create()
    {
        return view('blog.create_tag');
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
           
        ]);

        Tag::create([
            'name'=>$request->input('name'),
            'slug'=>SlugService::createSlug(Tag::class, 'slug', $request->name)
        ]);

        return redirect('/tags/create')->with('message_red', 'Tag criada com sucesso! :)');

    }

      /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
        public function show($slug)
        {
       
          
             return view('blog.by_tag');
            //     ->with('posts', Post::where('slug', $slug)->get());
        }

        public function destroy($slug)
        {
            $tag = Tag::where('slug', $slug);
            $tag->delete();
    
            return redirect('/tags')
                ->with('message_black', 'Postagem excluída! :c');
        }
}
