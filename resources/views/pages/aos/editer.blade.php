@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    <h4>Modifier un AO</h4>
                </div>
                <div class="button">
                    <a href="{{route('aos.consulter')}}" class="btn btn-success">consulter les aos</a>
                </div>
            </div>
            <div class="card-body">
                @include('flash')
                <form action="{{route('aos.update', $ao)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form py-5">
                        <div class="form-group mb-3">
                            <label for="num_AO">numero AO</label>
                            <input type="text" class="form-control" name="num_AO" placeholder="Numéro Ao" value={{old('num_AO', $ao->num_AO)}}>
                            @error('num_AO') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="num_marche">numero Marché</label>
                            <input type="text" class="form-control" name="num_marche" placeholder="Numéro Marche" value={{old('num_marche', $ao->num_marche)}}>
                            @error('num_marche') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="pays_id">Pays</label>
                            <select name="pays_id" class="form-control">
                                <option value="">séléctionner le pays</option>
                                @foreach($pays as $pays)
                                    <option value="{{$pays->id}}" @if((old('pays_id')) && old('pays_id') == $pays->id) {{'selected'}}@elseif(($ao->pays_id) && $ao->pays_id == $pays->id){{'selected'}}@endif>{{$pays->pays}}</option>
                                @endforeach
                            </select>
                            @error('pays_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="secteur_id">Sécteur d'activité</label>
                            <select name="secteur_id" class="form-control">
                                <option value="">séléctionner le sécteur d'activité</option>
                                @foreach($secteur_activites as $secteur)
                                    <option value="{{$secteur->id}}" @if((old('secteur_id')) && old('secteur_id') == $secteur->id) {{'selected'}}@elseif(($ao->secteur_id) && $ao->secteur_id == $secteur->id){{'selected'}}@endif>{{$secteur->secteur}}</option>
                                @endforeach
                            </select>
                            @error('secteur_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="ministere_id">ministère de tuelle</label>
                            <select name="ministere_id" class="form-control">
                                <option value="">séléctionner le ministère de tuelle</option>
                                @foreach($ministere_tuelles as $ministere)
                                    <option value="{{$ministere->id}}" @if((old('ministere_id')) && old('ministere_id') == $ministere->id) {{'selected'}}@elseif(($ao->ministere_id) && $ao->ministere_id == $ministere->id){{'selected'}}@endif>{{$ministere->ministere}}</option>
                                @endforeach
                            </select>
                            @error('ministere_tuelle') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <!-- bu et departement-->
                        <div class="form-group mb-3">
                            <label for="bu_id">BU</label>
                            <select name="bu_id[]" class="form-control" multiple>
                                <option value="">séléctionner le BU</option>
                                @foreach($bus as $bu)
                                    <option value="{{$bu->id}}" @if((old('bu_id')) && old('bu_id') == $bu->id) {{'selected'}}@elseif(($ao->bu_id) && $ao->bu_id == $bu->id){{'selected'}}@endif>{{$bu->nom}}</option>
                                @endforeach
                            </select>
                            @error('bu_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="departement_id">Département</label>
                            <select name="departement_id[]" class="form-control" multiple>
                                <option value="">séléctionner le Département</option>
                                @foreach($departements as $departement)
                                    <option value="{{$departement->id}}" @if((old('departement_id')) && old('departement_id') == $departement->id) {{'selected'}}@elseif(($ao->departement_id) && $ao->departement_id == $departement->id){{'selected'}}@endif>{{$departement->nom}}</option>
                                @endforeach
                            </select>
                            @error('departement_id') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <!-- bu et departement-->


                        <div class="form-group mb-3">
                            <label for="client">client</label>
                            <input type="text" class="form-control" name="client" placeholder="client" value={{old('client', $ao->client)}}>
                            @error('client') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="objet">objet</label>
                            <textarea name="objet" placeholder="objet" class="form-control" rows="5">{{old('objet', $ao->objet)}}</textarea>
                            @error('objet') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="date_limite">date limite</label>
                            <input type="date" class="form-control" name="date_limite" placeholder="date_limite" value={{old('date_limite', $ao->date_limite)}}>
                            @error('date_limite') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="partenariat">partenariat</label>
                            <input type="text" class="form-control" name="partenariat" placeholder="partenariat" value={{old('partenariat', $ao->partenariat)}}>
                            @error('partenariat') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="adjudication">adjudication</label>
                            <input type="text" class="form-control" name="adjudication" placeholder="adjudication" value={{old('adjudication', $ao->adjudication)}}>
                            @error('adjudication') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="adjudicataire">adjudicataire</label>
                            <input type="text" class="form-control" name="adjudicataire" placeholder="adjudicataire" value={{old('adjudicataire', $ao->adjudicataire)}}>
                            @error('adjudicataire') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="budget">budget</label>
                            <input type="text" class="form-control" name="budget" placeholder="budget" value={{old('budget', $ao->budget)}}>
                            @error('budget') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="montant_soumission">montant de soumission</label>
                            <input type="text" class="form-control" name="montant_soumission" placeholder="montant de soumission" value={{old('montant_soumission', $ao->montant_soumission)}}>
                            @error('montant_soumission') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="montant_moins_disant">montant moins disant</label>
                            <input type="text" class="form-control" name="montant_moins_disant" placeholder="montant moins disant" value={{old('montant_moins_disant', $ao->montant_moins_distant)}}>
                            @error('montant_moins_disant') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="date_adjudication">date adjudication</label>
                            <input type="date" class="form-control" name="date_adjudication" placeholder="date_adjudication" value={{old('date_adjudication', $ao->date_adjudication)}}>
                            @error('date_adjudication') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="motif_rejet">motif du rejet</label>
                            <textarea name="motif_rejet" placeholder="motif du rejet" class="form-control" rows="5">{{old('motif_rejet', $ao->motif_rejet)}}</textarea>
                            @error('motif_rejet') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="adresse">l'adresse</label>
                            <input type="text" class="form-control" name="adresse" placeholder="l'adresse" value={{old('adresse', $ao->adresse)}}>
                            @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="geom">geom</label>
                            <input type="text" class="form-control" name="geom" placeholder="geom" value={{old('geom', $ao->geom)}}>
                            @error('geom') <span class="text-danger">{{$message}}</span> @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="submit" value='modifier'>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
