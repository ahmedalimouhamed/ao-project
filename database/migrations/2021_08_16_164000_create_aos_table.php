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

            /**section_1**/
            $table->string('num_AO')->unique();
            $table->text('objet');
            $table->date('date_limite');
            $table->string('partenariat');
            $table->string('adjudication');
            $table->integer('n_lot')->unsigned();
            $table->float('budget', 10,2);
            $table->float('montant_soumission', 10,2);
            $table->float('montant_c_p', 10,2);
            $table->date('date_adjudication')->nullable();
            $table->string('RC');
            $table->string('CPS');
            $table->foreignId('client_id')->constrained('clients');
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('pays_id')->constrained('pays');
            $table->foreignId('critere_selection_id')->constrained('critere_selections');
            $table->foreignId('secteur_id')->constrained('secteur_activites');
            $table->foreignId('ministere_id')->constrained('ministere_de_tuelles');

            /**section_3**/
            $table->text('adresse');
            $table->string('geom');
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
