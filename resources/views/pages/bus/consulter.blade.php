@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <h4>Consulter les Bus</h4>
            </div>
            <div class="button">
                <a href="{{route('bus.ajouter')}}" class="btn btn-success">Ajouter un BU</a>
            </div>
        </div>

        <div class="card-body">
            @include('flash')

            <table class='table table-striped'>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nom</th>
                        <th>description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bus as $bu)
                    <tr>
                        <td>{{$bu->id}}</td>
                        <td>{{$bu->nom}}</td>
                        <td>{{$bu->description}}</td>
                        <form action="{{route('bus.destroy', $bu)}}" method ="post">
                            @csrf
                            @method('delete')
                            <td>
                                <a class="btn btn-info" href="{{route('bus.afficher', $bu)}}">Afficher</a>
                                <a class="btn btn-warning" href="{{route('bus.editer', $bu)}}">Editer</a>
                                <input type="submit" class="btn btn-danger" value="supprimer">
                            </td>
                        </form>

                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </div>
</div>
@endsection
