@extends('layouts.app')

@section('content')
    <section id="main-div" class="bg-light">
        @if(session()->has('message_black'))
            @component('blog._components._alert', ['class' => 'message_black'])
                {{session()->get('message_black')}}
            @endcomponent
        @endif
        @if(session()->has('message_red'))
            @component('blog._components._alert', ['class' => 'message_red'])
                {{session()->get('message_red')}}
            @endcomponent
        @endif
        <div class='space-between d-flex'>
            <h1 id="latest" >Escritos</h1>
            @if(Auth::check())
               @component('blog._components._redlink', ['text' => 'escrever', 'route' => '/blog/create'])
               @endcomponent
            @endif
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