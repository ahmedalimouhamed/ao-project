<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aos', function (Blueprint $table) {
            $table->id();
            $table->string('num_AO')->unique();
            $table->string('num_marche');
            $table->string('client');
            $table->text('objet');
            $table->date('date_limite');
            $table->string('partenariat');
            $table->string('adjudication');
            $table->string('adjudicataire');
            $table->float('budget', 10,2);
            $table->float('montant_soumission', 10,2);
            $table->float('montant_moins_disant', 10,2);
            $table->date('date_adjudication')->nullable();
            $table->text('motif_rejet')->nullable();
            $table->text('adresse');
            $table->string('geom');
            $table->foreignId('pays_id')->constrained('pays');
            $table->foreignId('secteur_id')->constrained('secteur_activites');
            $table->foreignId('ministere_id')->constrained('ministere_de_tuelles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aos');
    }
}
