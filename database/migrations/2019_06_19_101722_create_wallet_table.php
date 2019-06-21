<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateWalletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         portefeuille => id 	id_user     type 		methode 	montant 	description 	Lieu  	Day		date_inserted
								Revenus		CB
								Dépenses	Chèque
								Transférer  Espéce
         */

        Schema::create('type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        DB::table('type')->insert([
            ['name' => 'Revenu'],
            ['name' => 'Dépense'],
            ['name' => 'Transférer']
        ]);

        Schema::create('method', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });


        DB::table('method')->insert([
            ['name' => 'CB'],
            ['name' => 'Chèque'],
            ['name' => 'Espèces']
        ]);

        Schema::create('wallets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_user');

            $table->bigInteger('id_type');
            $table->foreign('id_type')->references('id')->on('type');

            $table->bigInteger('id_method');
            $table->foreign('id_method')->references('id')->on('method');

            $table->float('amount');
            $table->string("description")->nullable();
            $table->string('place')->nullable();
            $table->timestamp('day');
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
        Schema::dropIfExists('wallet');
    }
}
