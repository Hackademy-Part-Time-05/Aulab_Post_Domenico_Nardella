<x-layout>
    
    <div class="container-fluid p-5 bg-info text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1">
                Bentornato, Amministratore
            </h1>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success text-center">
            {{ session('message')}}
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo amministratore</h2>
                <x-requests-table :roleRequest="$adminRequests" role="amministratore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo revisore</h2>
                <x-requests-table :roleRequest="$revisorRequests" role="revisore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per ruolo redattore</h2>
                <x-requests-table :roleRequest="$writerRequests" role="redattore"/>
            </div>
        </div>
    </div>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>I tags della piattaforma</h2>
                <x-metaInfo-table :metaInfos="$tags" metaType="tags" />
            </div>
        </div>
    </div>

</x-layout>