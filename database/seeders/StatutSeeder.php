<?php

namespace Database\Seeders;

use App\Models\Statut;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuts')->delete();

        $statuts = array("Statut 1","Statut 2","Statut 3");

        foreach($statuts as $statut){
            Statut::create(['statut'=>$statut]);
        }
    }
}
