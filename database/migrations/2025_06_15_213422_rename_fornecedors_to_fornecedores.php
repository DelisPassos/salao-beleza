<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameFornecedorsToFornecedores extends Migration
{
    public function up()
    {
        Schema::rename('fornecedors', 'fornecedores');
    }

    public function down()
    {
        Schema::rename('fornecedores', 'fornecedors');
    }
}
