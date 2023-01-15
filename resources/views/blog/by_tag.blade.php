@extends('layouts.app')

@section('content')
    <section id="main-div" class="bg-light">
        <div class='space-between d-flex'>
            <h1 id="latest" >Escritos: </h1>
        </div>
        <div id="main-section">
            @foreach ($posts as $key => $post)
               @component('blog._components._article', ['post' => $post])
                @endcomponent
            @endforeach
        </div>
        <div class="line"></div>
    </section>
@endsection