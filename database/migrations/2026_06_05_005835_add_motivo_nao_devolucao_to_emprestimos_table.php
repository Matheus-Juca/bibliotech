<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("
            ALTER TABLE emprestimos
            MODIFY status ENUM(
                'emprestado',
                'devolvido',
                'atrasado',
                'nao_devolvido'
            ) NOT NULL DEFAULT 'emprestado'
        ");
    }

    public function down(): void
    {
        DB::statement("
            ALTER TABLE emprestimos
            MODIFY status ENUM(
                'emprestado',
                'devolvido',
                'atrasado'
            ) NOT NULL DEFAULT 'emprestado'
        ");
    }
};