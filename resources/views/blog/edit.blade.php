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
    <div>
        <form
            action="/blog/{{ $post->slug }}"
            method="POST"
            enctype="multipart/form-data"
            class="d-flex column" 
            >
            @csrf
            @method('PUT')
            
            <input
                type="text"
                name="title"
                value="{{$post->title}}"
                id="title-input"
                >
            <textarea
                name="description"
                placeholder="Texto..."
                class="ckeditor"
                >
            {{$post->description}}
            </textarea>
            <div class="d-flex space-between div-submit">
                <div class="">
                    <label class="">
        
                        <div class="borda-black">
                            <a class="design-btn">
                                <input 
                                    type="file"
                                    name="image"
                                    class=" input-arruma"> Pegar imagem
                            </a>
                        </div>
                    </label>
                </div>
                <button    
                    type="submit"
                    class="uppercase borda">
                    <a class="write-btn">
                        Publicar
                    </a>
                </button>
            </div>
        </form>
    </div>
</section>
@endsection