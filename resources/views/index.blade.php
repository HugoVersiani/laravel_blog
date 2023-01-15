@extends('layouts.app')

@section('content')
    <section id="main-div" class="bg-light">
        <h1 id="latest" >Mais recentes</h1>
        <span>O diário de bordo da jornada de um desenvolvedor web:</span>
         <div id="main-section">
            @foreach ($posts as $key => $post)
               @component('blog._components._article', ['post' => $post])
                @endcomponent
            @endforeach
        </div>
    </section>
@endsection