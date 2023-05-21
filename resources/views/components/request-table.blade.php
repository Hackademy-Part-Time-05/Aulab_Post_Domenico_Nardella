<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th class="col">#</th>
            <th class="col">Nome</th>
            <th class="col">Email</th>
            <th class="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach($roleRequest as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button class="btn btn-info text-white">Attiva {{ $role }}</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>