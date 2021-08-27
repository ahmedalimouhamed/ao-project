<?php

namespace App\Http\Controllers;

use App\Models\Ao;
use App\Models\Bu;
use App\Models\Critere_selection;
use App\Models\Departement;
use App\Models\ministere_de_tuelle;
use App\Models\Pays;
use App\Models\Secteur_activite;
use App\Models\Critere_adjudication;
use App\Models\Client;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;

class AoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aos = Ao::all();
        return view('pages.aos.consulter', compact('aos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bus = Bu::orderBy('nom')->get();
        $departements = Departement::orderBy('nom')->get();
        $secteur_activites = Secteur_activite::orderBy('secteur')->get();
        $pays = Pays::orderBy('pays')->get();
        $ministere_tuelles = ministere_de_tuelle::orderBy('ministere')->get();
        $criteres = Critere_selection::orderBy('critere')->get();
        $clients = Client::orderBy('client')->get();
        return view('pages.aos.ajouter', compact('bus', 'departements', 'pays', 'secteur_activites', 'ministere_tuelles', 'criteres', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        try{
            $ao = new Ao();
            $ao->num_AO = $request->n_ao;
            $ao->num_marche = $request->n_marche;
            $ao->pays_id = $request->pays_id;
            $ao->secteur_id = $request->secteur_id;
            $ao->ministere_id = $request->ministere_id;
            $ao->client = (!empty($request->client))? $request->client : '';
            $ao->objet = (!empty($request->objet))?$request->objet : '';
            $ao->date_limite = $request->date_limite;
            $ao->partenariat = (!empty($request->partenariat))?$request->partenariat : '';
            $ao->adjudicataire = (!empty($request->adjudicataire))?$request->adjudicataire : '';
            $ao->adjudication = (!empty($request->adjudication))?$request->adjudication : '';
            $ao->budget = (!empty($request->budget))?$request->budget : 0.00;
            $ao->montant_soumission = (!empty($request->montant_soumission))?$request->montant_soumission : 0.00;
            $ao->montant_moins_disant = (!empty($request->montant_moins_disant))?$request->montant_moins_disant : 0.00;
            $ao->date_adjudication = $request->date_adjudication;
            $ao->motif_rejet = (!empty($request->motif_rejet))?$request->motif_rejet : '';
            $ao->adresse = (!empty($request->adresse))?$request->adresse : '';
            $ao->geom = (!empty($request->geom))?$request->geom : '';
/*
            $arr_bu = [];
            $arr_departement = [];
            foreach($ao->bu_id as $bu){
                array_push($arr_bu, ['bu_id'=>$bu]);
            }

            foreach($ao->departement_id as $departement){
                array_push($arr_departement, ['departement_id'=>$departement]);
            }
*/
            //dd($arr_bu);
            //dd($arr_departement);

            DB::transaction(function() use($ao, $request){
                if($ao->save()){
                    $ao->bus()->sync($request->bu_id);
                    $ao->bus()->sync($request->departement_id);
                    return redirect()->route('aos.consulter')->with('success', 'AO Ajouté avec succes');
                }else{
                    throw new Exception('il y a une erreur de saisie');
                }
            });

        }catch(\Exception $e){
            return redirect()->back()->with('erreur', 'érreur : '. $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function show(Ao $ao)
    {
        return view('pages.aos.afficher');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function edit(Ao $ao)
    {
        $bus = Bu::orderBy('nom')->get();
        $departements = Departement::orderBy('nom')->get();
        $secteur_activites = Secteur_activite::orderBy('secteur')->get();
        $pays = Pays::orderBy('pays')->get();
        $ministere_tuelles = ministere_de_tuelle::orderBy('ministere')->get();
        return view('pages.aos.editer', compact('ao', 'bus', 'departements', 'pays', 'secteur_activites', 'ministere_tuelles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ao $ao)
    {
        try{
            $ao->num_AO = $request->num_AO;
            $ao->num_marche = $request->num_marche;
            $ao->pays_id = $request->pays_id;
            $ao->secteur_id = $request->secteur_id;
            $ao->ministere_id = $request->ministere_id;
            $ao->bu_id = $request->bu_id;
            $ao->departement_id = $request->departement_id;
            $ao->client = (!empty($request->client))? $request->client : '';
            $ao->objet = (!empty($request->objet))?$request->objet : '';
            $ao->date_limite = $request->date_limite;
            $ao->partenariat = (!empty($request->partenariat))?$request->partenariat : '';
            $ao->adjudicataire = (!empty($request->adjudicataire))?$request->adjudicataire : '';
            $ao->adjudication = (!empty($request->adjudication))?$request->adjudication : '';
            $ao->budget = (!empty($request->budget))?$request->budget : 0.00;
            $ao->montant_soumission = (!empty($request->montant_soumission))?$request->montant_soumission : 0.00;
            $ao->montant_moins_disant = (!empty($request->montant_moins_disant))?$request->montant_moins_disant : 0.00;
            $ao->date_adjudication = $request->date_adjudication;
            $ao->motif_rejet = (!empty($request->motif_rejet))?$request->motif_rejet : '';
            $ao->adresse = (!empty($request->adresse))?$request->adresse : '';
            $ao->geom = (!empty($request->geom))?$request->geom : '';
            if($ao->save()){
                $ao->bus()->sync(['bu_id'=>$ao->bu_id]);
                $ao->departements()->sync(['departement_id'=>$ao->departement_id]);
                return redirect()->route('aos.consulter')->with('success', 'AO Modifié avec succes');
            }else{
                throw new Exception('il y a une erreur de modification');
            }
        }catch(\Exception $e){
            return redirect()->back()->with('erreur', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ao  $ao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ao $ao)
    {
        try{
            if($ao->delete()){
                return redirect()->route('aos.consulter')->with('success', 'Utilisateur supprimé avec succée');
            }else{
                throw new Exception('il y a un érreur de supprission');
            }

        }catch(\Exception $e){
            return redirect()->back()->with('erreur', $e->getMessage());
        }
    }
}
