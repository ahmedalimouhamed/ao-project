@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Consulter les Bus</h4>
                </div>
                <div class="button">
                    <a href="{{route('utilisateurs.ajouter')}}" class="btn btn-success">Ajouter un département</a>
                </div>
            </div>

            <div class="card-body">
                @include('flash')

                <table class='table table-striped'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>nom et prénom</th>
                        <th>statut</th>
                        <th>nom d'utilisateur</th>
                        <th>émail</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($utilisateurs as $utilisateur)
                        <tr>
                            <td>{{$utilisateur->id}}</td>
                            <td>{{$utilisateur->nom_prenom}}</td>
                            <td>{{$utilisateur->statut->statut}}</td>
                            <td>{{$utilisateur->username}}</td>
                            <td>{{$utilisateur->email}}</td>
                            <form action="{{route('utilisateurs.destroy', $utilisateur)}}" method ="post">
                                @csrf
                                @method('delete')
                                <td>
                                    <a class="btn btn-info" href="{{route('utilisateurs.afficher', $utilisateur)}}">Afficher</a>
                                    <a class="btn btn-warning" href="{{route('utilisateurs.editer', $utilisateur)}}">Editer</a>
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
