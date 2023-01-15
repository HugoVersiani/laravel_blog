@extends('layouts.app')

@section('content')
<section id="main-div" class="bg-light">
    @if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                {{$error}}
            @endforeach
        </div>
    @endif
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
    <div>
        <form
            action="/tags"
            method="POST"
            enctype="multipart/form-data"
            class="d-flex" 
            id="form-input"
            >
            @csrf
            
            <input
                type="text"
                name="name"
                placeholder="Sua nova tag..."
                >
                <button    
                    type="submit"
                    class="uppercase border-red">
                    <a class="link-style-red">
                        Adicionar
                    </a>
                </button>
            </div>
        </form>
    </div>
</section>
@endsection