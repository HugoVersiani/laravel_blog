<div class="line"></div>
    <section class="section-preview d-flex">
        <div style="background-image:url({{asset('images/'.$post->image_path)}})" class="left-content">
            
            {{-- <span class="date-span">
                Por {{$post->user->name}}, {{date('j M Y', strtotime($post->updated_at) )}}
            </span> --}}
        </div>
        <div class="right-content">
            <div class="text-description">
                <span class="tag"> POO </span>
                <span class="tag"> PHP </span>
                <a  href="/blog/{{$post->slug}}"><h1>{{$post->title}}</h1></a>
                <p>
                  
                    {{substr(strip_tags($post->description), 0, 80)}}
                    <a class="more" href="/blog/{{$post->slug}}" >
                    Ler mais...
                    </a>
                </p>
    
            </div>
            @if(Auth::check() && Auth::user()->id == $post->user_id)
                <div class="d-flex edit-delete-div" >
                    <a class="edit-link" href="/blog/{{$post->slug}}/edit" >
                    Editar
                    </a>
                    <form class="border-black" 
                        action="/blog/{{ $post->slug }}"
                        method="POST">
                        @csrf
                        @method('delete')

                        <button
                            class="link-style-transparent"
                            type="submit">
                            Excluir
                        </button>

                    </form>
                    </a>
                </div>
            @endif
        </div>
    </section>