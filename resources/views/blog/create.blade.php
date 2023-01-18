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
            action="/blog"
            method="POST"
            enctype="multipart/form-data"
            class="d-flex column" 
            >
            @csrf
            
            <input
                type="text"
                name="title"
                placeholder="Título..."
                id="title-input"
                >
            <textarea
                name="description"
                placeholder="Texto..."
                class="ckeditor"
                >
            </textarea>
            <div class="d-flex space-between div-submit">
                <div class="">
                    <label class="">
                        @component('blog._components._blacklink', ['text' => 'Imagem', 'route' => ''])
                          <input type="file" name="image" class=" input-arruma"> 
                        @endcomponent
                    </label>
                </div>
                <button    
                    type="submit"
                    class="uppercase border-red">
                    <a class="link-style-red">
                        Publicar
                    </a>
                </button>
            </div>

           

            <select name="tags[]" multiple>
                @foreach($tags as $tag)
                    <option value="{{$tag['id']}}"> {{$tag['name']}}</option>
                @endforeach
            </select>
        </form>
    </div>
</section>
@endsection