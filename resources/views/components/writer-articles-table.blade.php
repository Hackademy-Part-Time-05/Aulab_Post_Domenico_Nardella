<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th class="col">#</th>
            <th class="col">Titolo</th>
            <th class="col">Sottotitolo</th>
            <th class="col">Categoria</th>
            <th class="col">Tags</th>
            <th class="col">Creato il</th>
            <th class="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->category->name ?? 'Non categorizzato' }}</td>
                <td>
                    @foreach($article->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </td>
                <td>{{ $article->created_at->format('d/m/Y')}}</td>
                <td>
                    <a href="{{ route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi l'articolo</a>
                    <a href="{{ route('article.edit', compact('article'))}}" class="btn btn-warning text-white">Modifica l'articolo</a>
                    <form action="{{ route('article.destroy', compact('article'))}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Elimina l'articolo</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>