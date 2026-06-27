    <?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('turmas', function (Blueprint $table) {

            $table->foreignId('proxima_turma_id')
                ->nullable()
                ->constrained('turmas')
                ->nullOnDelete();

        });
    }

    public function down(): void
    {
        Schema::table('turmas', function (Blueprint $table) {

            $table->dropForeign(['proxima_turma_id']);
            $table->dropColumn('proxima_turma_id');

        });
    }
};
