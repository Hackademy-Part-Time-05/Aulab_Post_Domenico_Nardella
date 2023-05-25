<table class="table table-striped table-hover border">
    <thead class="table-dark">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome tag</th>
            <th scope="col">Q.ta articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
            <tr>
                <th scope="row">{{ $metaInfo->id }}</th>
                <td>{{ $metaInfo->name }}</td>
                <td>{{ count($metaInfo->articles) }}</td>
                @if($metaType == "tags")
                <td>
                    <form action="{{ route('admin.editTag', ['tag' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome" class="form-control w-50 d-inline">
                        <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger text-white">Elimina</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.editCategory', ['category' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('put')
                        <input type="text" name="name" placeholder="Nuovo nome" class="form-control w-50 d-inline">
                        <button type="submit" class="btn btn-info text-white">Aggiorna</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('admin.deleteCategory', ['category' => $metaInfo]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger text-white">Elimina</button>
                    </form>
                </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>


@if(is_null($article->is_accepted))
<a href="{{ route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi l'articolo</a>
@else
<a href="{{ route('revisor.undoArticle', compact('article'))}}" class="btn btn-info text-white">Riporta in revisione</a>
@endif