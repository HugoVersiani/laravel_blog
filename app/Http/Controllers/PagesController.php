<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\Tag;

class PagesController extends Controller
{
    public function index() {

        $tags = Tag::with('posts')->get();
        
        return view('index', compact('tags'))->with('posts', Post::orderBy('created_at', 'DESC')
                                                                        ->limit(3)
                                                                        ->get());
    }
    
}
