<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('libelle');
            $table->string('description');
            $table->timestamps();
        });

        $roles = [
            array(
                "libelle" => "ADMINISTRATEUR",
                "description" => "DROIT SUR TOUT"
            ),
            array(
                "libelle" => "AGENCE",
                "description" => "DROIT DE RECHARGER LE COMPTE"
            ),
            array(
                "libelle" => "DAF",
                "description" => "DROIT DE VOIR LES DIFFERENTES OPERATIONS, COURBE STATISTIQUE D'UTILSATION DU SERVICE PAR JOUR"
            )
        ];

        foreach($roles as $role) {
            DB::table('roles')->insert(
                $role
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
