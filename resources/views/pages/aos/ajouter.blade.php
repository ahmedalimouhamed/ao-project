@extends('layouts.admin_layout')
@section('content')
    <div class="content-wrapper py-5 px-3 bg-white">
        <div class="panel panel-default">
            <div class="panel-heading d-flex justify-content-between align-items-center bg-blue-light p-2 pl-3">
                <div>
                    <h4 class="text-gray-dark m-0" style="font-size:20px">Ajouter un AO</h4>
                </div>
                <div class="button">
                    <a href="{{route('aos.consulter')}}" class="btn bg-blue-button rounded text-white">Consulter les AOs</a>
                </div>
            </div>
            <div class="panel-body px-3 border">
                <div class="row py-5">
                    <div class="aside col-3">
                        <div class="h-100 border">
                            <div class="titre bg-blue p-2 py-3 mb-0">
                                <h4 class="text-capitalize m-0 text-center" style="font-size:18px">préparation réponse</h4>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                                <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                                <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                                <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                                <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                                <li class="list-group-item border-right-0 border-top-0 border-left-0">list</li>
                            </ul>
                        </div>

                    </div>
                    <div class="form col-9 border p-0">
{{--                        <div class="titre bg-blue p-2 py-3 mb-0">--}}
{{--                            <h4 class="text-capitalize m-0 text-center" style="font-size:18px">informations générales</h4>--}}
{{--                        </div>--}}
                        <div class="content-form-body p-3">
                            <div class="position-relative w-75 mx-auto mb-4">
                                <!-- Progress bar -->
                                <div class="before-bar"></div>
                                <div class="progressbar">
                                    <div class="progress" id="progress"></div>

                                    <div class="progress-step progress-step-active" data-title="Informations Générales"></div>
                                    <div class="progress-step" data-title="Affectations"></div>
                                    <div class="progress-step" data-title="Localisation"></div>
                                </div>
                            </div>

                            <div class="content-form">
                                @include('flash')
                                <form action="{{route('aos.store')}}" method="post" enctype="multipart/form-data" class="">
                                    @csrf
                                    <section class="section_1 form-step form-step-active" id="section_1">
                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="n_ao" class="mb-2">numero AO</label>
                                                <input type="text" class="form-control" name="n_ao" placeholder="Numéro Ao" value={{old('n_ao')}}>
                                                @error('n_ao') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="date_limite">date limite</label>
                                                <input type="date" class="form-control" name="date_limite" placeholder="date_limite" value={{old('date_limite')}}>
                                                @error('date_limite') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="pays_id" class="mb-2">Pays</label>
                                                <select name="pays_id" class="form-control">
                                                    <option value="">séléctionner le pays</option>
                                                    @foreach($pays as $pays)
                                                        <option value="{{$pays->id}}" @if((old('pays_id')) && old('pays_id') == $pays->id) {{'selected'}} @endif>{{$pays->pays}}</option>
                                                    @endforeach
                                                </select>
                                                @error('pays_id') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="type" class="mb-2">Type</label>
                                                <input type="text" class="form-control" name="type" placeholder="type" value={{old('type')}}>
                                                @error('type') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="date_adjudication" class="mb-2">date adjudication</label>
                                                <input type="date" class="form-control" name="date_adjudication" placeholder="date_adjudication" value={{old('date_adjudication')}}>
                                                @error('date_adjudication') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="ministere_id" class="mb-2">Minister de tuelle</label>
                                                <select name="ministere_id" class="form-control">
                                                    <option value="">séléctionner le Minister de tuelle</option>
                                                    @foreach($ministere_tuelles as $ministere)
                                                        <option value="{{$ministere->id}}" @if((old('ministere_id')) && old('ministere_id') == $ministere->id) {{'selected'}} @endif>{{$ministere->ministere}}</option>
                                                    @endforeach
                                                </select>
                                                @error('ministere_id') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="secteur_id" class="mb-2">Sécteur d'activité</label>
                                                <select name="secteur_id" class="form-control">
                                                    <option value="">séléctionner le sécteur d'activité</option>
                                                    @foreach($secteur_activites as $secteur)
                                                        <option value="{{$secteur->id}}" @if((old('secteur_id')) && old('secteur_id') == $secteur->id) {{'selected'}} @endif>{{$secteur->secteur}}</option>
                                                    @endforeach
                                                </select>
                                                @error('secteur_activite') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="partenariat" class="mb-2">partenariat</label>
                                                <input type="text" class="form-control" name="partenariat" placeholder="partenariat" value={{old('partenariat')}}>
                                                @error('partenariat') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="montant_soumission" class="mb-2">montant de soumission</label>
                                                <input type="text" class="form-control" name="montant_soumission" placeholder="montant de soumission" value={{old('montant_soumission')}}>
                                                @error('montant_soumission') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="budget" class="mb-2">budget</label>
                                                <input type="text" class="form-control" name="budget" placeholder="budget" value={{old('budget')}}>
                                                @error('budget') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="n_lot" class="mb-2">nombre de lotissement</label>
                                                <input type="text" class="form-control" name="n_lot" placeholder="nombre de lotissement" value={{old('n_lot')}}>
                                                @error('n_lot') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="client_id" class="mb-2">client</label>
                                                <select name="client_id" class="form-control">
                                                    <option value="">séléctionner le client</option>
                                                    @foreach($clients as $client)
                                                        <option value="{{$client->id}}" @if((old('client_id')) && old('client_id') == $client->id) {{'selected'}} @endif>{{$client->client}}</option>
                                                    @endforeach
                                                </select>
                                                @error('client') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                        </div>

                                        <div class="row mb-3">

                                            <div class="form-group col-4">
                                                <label for="montant_c_p">montant du caution provisoire</label>
                                                <input type="text" class="form-control" name="montant_c_p" placeholder="montant caution provisoire" value={{old('montant_c_p')}}>
                                                @error('montant_c_p') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="crit_adjudication" class="mb-2">Critère d'adjiducation</label>
                                                <select name="crit_adjudication" class="form-control">
                                                    <option value="">séléctionner le critère d'adjudication</option>
                                                    @foreach($criteres as $critere)
                                                        <option value="{{$critere->id}}" @if((old('critere_id')) && old('critere_id') == $critere->id) {{'selected'}} @endif>{{$critere->critere}}</option>
                                                    @endforeach
                                                </select>
                                                @error('crit_adjudication') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="objet">objet</label>
                                            <textarea name="objet" placeholder="objet" class="form-control" rows="5">{{old('objet')}}</textarea>
                                            @error('objet') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="row mb-3">
                                            <div class="form-group col">
                                                <label for="rc" class="mb-2">RC</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="rc">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                @error('rc') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                            <div class="form-group col">
                                                <label for="cps" class="mb-2">CPS</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile" name="cps">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                @error('cps') <span class="text-danger">{{$message}}</span> @enderror
                                            </div>

                                        </div>

                                    </section>

                                    <section class="section_2 form-step" id="section_2">
                                        <div class="partie_admin mb-4">
                                            <fieldset class="p-3 border scheduler-border">
                                                <legend class="scheduler-border text-capitalize" style="font-size:18px">partie administratif </legend>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="header bg-blue-light p-2">
                                                            <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">secrétaires</h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="secretaire_id" id="" multiple style="height:120px">
                                                                <option value="1">select secretaire</option>
                                                                <option value="2">select secretaire</option>
                                                                <option value="3">select secretaire</option>
                                                                <option value="4">select secretaire</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                                        <div>
                                                            <button type="button" class="btn bg-blue-light d-block mb-3 text-bold text-gray-dark">>></button>
                                                            <button type="button" class="btn bg-gray d-block text-bold "><<</button>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="header bg-blue-light p-2">
                                                            <h6 class="text-white text-capitalize text-gray-dark text-bold m-0">secrétaires affectés</h6>
                                                        </div>
                                                        <div class="w-100 border p-2" style="height: 120px">
                                                            <ul class="list-group">
                                                                <li class="list-unstyled">selected 1</li>
                                                                <li class="list-unstyled">selected 2</li>
                                                                <li class="list-unstyled">selected 3</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="partie_finance mb-4">
                                            <fieldset class="p-3 border scheduler-border">
                                                <legend class="scheduler-border text-capitalize" style="font-size:18px">partie financiaire </legend>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="header  bg-blue-light p-2">
                                                            <h6 class="text-white text-capitalize text-gray-dark text-bold m-0">BUs</h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="secretaire_id" id="" multiple style="height:120px">
                                                                <option value="1">select secretaire</option>
                                                                <option value="2">select secretaire</option>
                                                                <option value="3">select secretaire</option>
                                                                <option value="4">select secretaire</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                                        <div>
                                                            <button type="button" class="btn bg-blue-light text-bold d-block mb-3">>></button>
                                                            <button type="button" class="btn bg-gray text-bold d-block"><<</button>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="header bg-blue-light p-2">
                                                            <h6 class="text-capitalize m-0 text-gray-dark text-bold">BUs affectés</h6>
                                                        </div>
                                                        <div class="w-100 border p-2" style="height: 120px">
                                                            <ul class="list-group">
                                                                <li class="list-unstyled">selected 1</li>
                                                                <li class="list-unstyled">selected 2</li>
                                                                <li class="list-unstyled">selected 3</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="patie_tech mb-4">
                                            <fieldset class="p-3 border scheduler-border">
                                                <legend class="scheduler-border text-capitalize" style="font-size:18px">partie technique </legend>
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="header bg-blue-light p-2">
                                                            <h6 class="text-gray-dark text-capitalize m-0 text-bold">departements</h6>
                                                        </div>
                                                        <div class="form-group">
                                                            <select class="form-control" name="secretaire_id" id="" multiple style="height:120px">
                                                                <option value="1">select secretaire</option>
                                                                <option value="2">select secretaire</option>
                                                                <option value="3">select secretaire</option>
                                                                <option value="4">select secretaire</option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                    <div class="col-4 d-flex justify-content-center align-items-center">
                                                        <div>
                                                            <button type="button" class="btn bg-blue-light d-block text-bold mb-3">>></button>
                                                            <button type="button" class="btn bg-gray d-block text-bold"><<</button>
                                                        </div>

                                                    </div>
                                                    <div class="col-4">
                                                        <div class="header bg-blue-light p-2">
                                                            <h6 class="text-white text-capitalize m-0 text-gray-dark text-bold">departements affectés</h6>
                                                        </div>
                                                        <div class="w-100 border p-2" style="height: 120px">
                                                            <ul class="list-group">
                                                                <li class="list-unstyled">selected 1</li>
                                                                <li class="list-unstyled">selected 2</li>
                                                                <li class="list-unstyled">selected 3</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </section>


                                    <section class="section_3 form-step" id="section_3">
                                        <div class="form-group mb-3">
                                            <label for="adresse mb-2">Adresse</label>
                                            <input type="text" class="form-control" name="adresse" placeholder="adresse" value={{old('adresse')}}>
                                            @error('adresse') <span class="text-danger">{{$message}}</span> @enderror
                                        </div>

                                        <div class="map bg-gray w-100  mb-3" style="height:300px"></div>
                                    </section>



                                    {{--                                <!-- bu et departement-->--}}
                                    {{--                                <div class="form-group mb-3">--}}
                                    {{--                                    <label for="bu_id">BU</label>--}}
                                    {{--                                    <select name="bu_id[]" class="form-control" multiple>--}}
                                    {{--                                        <option value="">séléctionner le BU</option>--}}
                                    {{--                                        @foreach($bus as $bu)--}}
                                    {{--                                            <option value="{{$bu->id}}" @if((old('bu_id')) && old('bu_id') == $bu->id) {{'selected'}} @endif>{{$bu->nom}}</option>--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                    </select>--}}
                                    {{--                                    @error('bu_id') <span class="text-danger">{{$message}}</span> @enderror--}}
                                    {{--                                </div>--}}
                                    {{--                                <div class="form-group mb-3">--}}
                                    {{--                                    <label for="departement_id">Département</label>--}}
                                    {{--                                    <select name="departement_id[]" class="form-control" multiple>--}}
                                    {{--                                        <option value="">séléctionner le Département</option>--}}
                                    {{--                                        @foreach($departements as $departement)--}}
                                    {{--                                            <option value="{{$departement->id}}" @if((old('departement_id')) && old('departement_id') == $departement->id) {{'selected'}} @endif>{{$departement->nom}}</option>--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                    </select>--}}
                                    {{--                                    @error('departement_id') <span class="text-danger">{{$message}}</span> @enderror--}}
                                    {{--                                </div>--}}
                                    {{--                                <!-- bu et departement-->--}}


                                    {{--                                --}}




                                    {{--                                <div class="form-group mb-3">--}}
                                    {{--                                    <label for="adjudication">adjudication</label>--}}
                                    {{--                                    <input type="text" class="form-control" name="adjudication" placeholder="adjudication" value={{old('adjudication')}}>--}}
                                    {{--                                    @error('adjudication') <span class="text-danger">{{$message}}</span> @enderror--}}
                                    {{--                                </div>--}}

                                    {{--                                <div class="form-group mb-3">--}}
                                    {{--                                    <label for="adjudicataire">adjudicataire</label>--}}
                                    {{--                                    <input type="text" class="form-control" name="adjudicataire" placeholder="adjudicataire" value={{old('adjudicataire')}}>--}}
                                    {{--                                    @error('adjudicataire') <span class="text-danger">{{$message}}</span> @enderror--}}
                                    {{--                                </div>--}}





                                    {{--                                <div class="form-group mb-3">--}}
                                    {{--                                    <label for="montant_moins_disant">montant moins disant</label>--}}
                                    {{--                                    <input type="text" class="form-control" name="montant_moins_disant" placeholder="montant moins disant" value={{old('montant_moins_disant')}}>--}}
                                    {{--                                    @error('montant_moins_disant') <span class="text-danger">{{$message}}</span> @enderror--}}
                                    {{--                                </div>--}}

                                    {{--                                <div class="form-group mb-3">--}}
                                    {{--                                    <label for="motif_rejet">motif du rejet</label>--}}
                                    {{--                                    <textarea name="motif_rejet" placeholder="motif du rejet" class="form-control" rows="5">{{old('motif_rejet')}}</textarea>--}}
                                    {{--                                    @error('motif_rejet') <span class="text-danger">{{$message}}</span> @enderror--}}
                                    {{--                                </div>--}}



                                    {{--                                <div class="form-group mb-3">--}}
                                    {{--                                    <label for="geom">geom</label>--}}
                                    {{--                                    <input type="text" class="form-control" name="geom" placeholder="montant moins disant" value={{old('geom')}}>--}}
                                    {{--                                    @error('geom') <span class="text-danger">{{$message}}</span> @enderror--}}
                                    {{--                                </div>--}}


                                    <div class="form-group clearfix">
                                        <div class="flex justify-content-between">
                                            <div class="button">
                                                <button class="pull-left btn bg-blue-button btn-prev text-white" type="button" value='suivant'>precedant</button>
                                            </div>
                                            <div class="button">
                                                <button class="pull-right btn bg-blue-button btn-next text-white" type="button" value='suivant'>suivant</button>
                                            </div>
                                        </div>
                                    </div>

{{--                                    <div class="form-group pull-right">--}}
{{--                                        <input type="submit" class="btn bg-blue-button" name="submit" value='suivant'>--}}
{{--                                    </div>--}}
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const progress = document.getElementById("progress");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".progress-step");

        let formStepsNum = 0;

        nextBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum++;
                updateFormSteps();
                updateProgressbar();
            });
        });

        prevBtns.forEach((btn) => {
            btn.addEventListener("click", () => {
                formStepsNum--;
                updateFormSteps();
                updateProgressbar();
            });
        });

        function updateFormSteps() {
            formSteps.forEach((formStep) => {
                formStep.classList.contains("form-step-active") &&
                formStep.classList.remove("form-step-active");
            });

            formSteps[formStepsNum].classList.add("form-step-active");
        }

        function updateProgressbar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("progress-step-active");
                } else {
                    progressStep.classList.remove("progress-step-active");
                }
            });

            const progressActive = document.querySelectorAll(".progress-step-active");

            progress.style.width =
                ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + "%";
        }
    </script>
@endsection
