@extends('layouts.app')
@section('content')
 <section id="main-div-reading" class="integra-text bg-light">
 <img style="max-width: 100%"  src="{{asset('images/'. $post->image_path)}}">
    <h1> {{$post->title}}</h1>
    <span>Por {{$post->user->name}} em {{date('jS M Y', strtotime($post->updated_at))}}</span>
    <div class="line"></div>
   
        {!!$post->description!!}
    
   
 </section>
@endsection