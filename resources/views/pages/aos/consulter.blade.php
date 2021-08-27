@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Consulter les Bus</h4>
                </div>
                <div class="button">
                    <a href="{{route('aos.ajouter')}}" class="btn btn-success">Ajouter un AO</a>
                </div>
            </div>

            <div class="card-body">
                @include('flash')

                <table class='table table-striped'>
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>num ao</th>
                        <th>num marché</th>
                        <th>Sécteur d'activité</th>
                        <th>Ministère de tuelle</th>
                        <th>Date limite</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($aos as $ao)
                        <tr>
                            <td>{{$ao->id}}</td>
                            <td>{{$ao->num_AO}}</td>
                            <td>{{$ao->num_marche}}</td>
                            <td>{{$ao->secteur_activite->secteur}}</td>
                            <td>{{$ao->ministere_de_tuelle->ministere}}</td>
                            <td>{{$ao->date_limite}}</td>
                            <form action="{{route('aos.destroy', $ao)}}" method ="post">
                                @csrf
                                @method('delete')
                                <td>
                                    <a class="btn btn-info" href="{{route('aos.afficher', $ao)}}">Afficher</a>
                                    <a class="btn btn-warning" href="{{route('aos.editer', $ao)}}">Editer</a>
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
