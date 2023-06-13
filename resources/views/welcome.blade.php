<x-layout>

    <div class="container-fluid p-5 bg-info opacity-25 text-center text-black">
        <div class="row justify-content-center">
            <h1 class="display-1">
                The Blog post
            </h1>
            @if(session('message'))
                <div class="alert alert-success text-center">
                    {{ session('message')}}
                </div>
            @endif
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3 m-3">
                    <div class="card">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            @if($article->category)
                                <a href="{{ route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{ $article->category->name }}</a>
                            @else
                            <p class="small text-muted fst-italic text-capitalize">
                                Non categorizzato
                            </p>
                            @endif
                            <span class="text-muted small fst-italic">- tempo di lettura {{ $article->readDuration()}} min</span>
                            <hr>
                            <p class="small fst-italic text-capitalize">
                                @foreach($article->tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
                            </p>
                        </div>
                        <div class="card-footer text-muted">
                            <a  class="" href="{{ route('article.byUser', ['user' => $article->user->id]) }}">Redatto il {{ $article->created_at->format('d/m/Y')}} da {{ $article->user->name }}</a>
                            <a  href="{{ route('article.show', compact('article')) }}" class="btn btn-info text-white">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
</x-layout>
