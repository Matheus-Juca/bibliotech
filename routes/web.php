<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\EmprestimoController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\RelatorioController;

/*
|--------------------------------------------------------------------------
| Emprestimos
|--------------------------------------------------------------------------
*/

Route::post(
    '/admin/emprestimos',
    [EmprestimoController::class, 'store']
)->name('emprestimos.store');

Route::put(
    '/emprestimos/{id}/nao-devolvido',
    [EmprestimoController::class, 'naoDevolvido']
)->name('emprestimos.naoDevolvido');
/*
|--------------------------------------------------------------------------
| Página Inicial
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('auth.login');
})->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');


});



/*
|--------------------------------------------------------------------------
| Perfil do usuário (Breeze)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Administração
|--------------------------------------------------------------------------
*/



Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Livros
    |--------------------------------------------------------------------------
    */


    Route::get('/livros', [LivroController::class, 'index'])
        ->name('admin.livros');

    
    Route::get('/cadlivro', function () {
        return view('admin.cadLivro');
    })->name('admin.cadlivro');

    Route::get('/admin/cadlivro', [LivroController::class, 'create'])
        ->name('admin.cadlivro');

    Route::post('/admin/cadlivro', [LivroController::class, 'store'])
        ->name('livros.store');


    Route::get('/livros/{livro}/edit', [LivroController::class, 'edit'])
    ->name('livros.edit');

    Route::put('/livros/{livro}', [LivroController::class, 'update'])
        ->name('livros.update');

    /*
    |--------------------------------------------------------------------------
    | Alunos
    |--------------------------------------------------------------------------
    */

    Route::get('/alunos', [AlunoController::class, 'index'])
    ->name('admin.alunos');

    Route::get('/admin/cadaluno', [AlunoController::class, 'create'])
    ->name('admin.cadaluno');

        
    Route::post('/admin/cadaluno', [AlunoController::class, 'store'])
    ->name('alunos.store');

    Route::get(
    '/alunos/{aluno}/editar',
    [AlunoController::class, 'edit']
)->name('alunos.edit');


    Route::delete(
    '/alunos/{aluno}',
    [AlunoController::class, 'destroy']
)->name('alunos.destroy');

Route::put(
    '/alunos/{aluno}',
    [AlunoController::class, 'update']
)->name('alunos.update');

    /*
    |--------------------------------------------------------------------------
    | Empréstimos
    |--------------------------------------------------------------------------
    */

Route::get('/emprestimos', [EmprestimoController::class, 'index'])
    ->name('admin.emprestimos');

    Route::get('/cademprestimo', function () {
        return view('admin.cadEmprestimo');
    })->name('admin.cademprestimo');
});


Route::put(
    '/emprestimos/{id}/devolver',
    [EmprestimoController::class, 'devolver']
)->name('emprestimos.devolver');

/*
|--------------------------------------------------------------------------
| Turmas
|--------------------------------------------------------------------------
*/

Route::resource('turmas', TurmaController::class);
Route::get('/turmas', [TurmaController::class, 'index'])->name('admin.turmas');


/*
|--------------------------------------------------------------------------
| Relatórios
|--------------------------------------------------------------------------
*/

Route::get('/relatorios', [RelatorioController::class, 'index'])
    ->name('admin.relatorio');

Route::get(
    '/relatorios/pdf',
    [RelatorioController::class, 'gerarPdf']
)->name('relatorios.pdf');

/*
|--------------------------------------------------------------------------
| Breeze Auth
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';