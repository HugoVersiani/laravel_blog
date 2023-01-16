@extends('layouts.app')
@section('content')
 <section id="main-div" class="integra-text bg-light">
    <div class='div-tags space-between d-flex'>
        <h1>Tags</h1>
        @if(Auth::check())
            @component('blog._components._redlink', ['text' => 'Nova Tag', 'route' => '/tags/create'])
            @endcomponent
        @endif
    </div>
    <div class="line"></div>
    <div class="d-flex tags-content">
   
        @foreach ($tags as $tag )
            
            <div  class="tag_on_page d-flex">
                <a href="/tags/{{$tag['slug']}}"> {{$tag['name']}}</a>
                @if(Auth::check())
                    <form action="/tags/{{ $tag->slug }}" method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="tag_delete"
                            type="submit">
                            ⨉
                        </button>
                    </form>
                @endif
            </div>
        @endforeach
    </div>
   
 </section>
@endsection