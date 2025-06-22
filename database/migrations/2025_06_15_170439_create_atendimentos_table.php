<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Tabela de atendimentos
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade');
            $table->foreignId('profissional_id')->nullable()->constrained('users')->onDelete('set null');
            $table->dateTime('data');
            $table->decimal('valor_pago', 10, 2)->default(0);
            $table->text('observacoes')->nullable();
            $table->timestamps();
        });

        // Pivot: atendimento_servico
        Schema::create('atendimento_servico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atendimento_id')->constrained()->onDelete('cascade');
            $table->foreignId('servico_id')->constrained()->onDelete('cascade');
            $table->decimal('preco', 8, 2);
            $table->timestamps();
        });

        // Pivot: atendimento_produto
        Schema::create('atendimento_produto', function (Blueprint $table) {
            $table->id();
            $table->foreignId('atendimento_id')->constrained()->onDelete('cascade');
            $table->foreignId('produto_id')->constrained()->onDelete('cascade');
            $table->integer('quantidade_usada');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atendimento_produto');
        Schema::dropIfExists('atendimento_servico');
        Schema::dropIfExists('atendimentos');
    }
};
