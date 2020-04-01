<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FormCadastroProdutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->date('dtnascimento')->nullable();
            $table->string('cpf', 14)->nullable();            
            $table->string('cnpj', 18)->nullable();
            $table->string('cep', 9)->nullable();
            $table->string('endereco', 100)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->integer('tipo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
