<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ProfileController;
use App\Livewire\CategoriesCreate;
use App\Livewire\CategoriesEdit;
use App\Livewire\CategoriesList;
use App\Livewire\ProductsList;
use App\Livewire\Questions\QuestionForm;
use App\Livewire\Questions\QuestionList;
use App\Livewire\Quiz\QuizForm;
use App\Livewire\Quiz\QuizList;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('auth/{provider}/redirect', [SocialiteController::class, 'loginSocial'])
        ->name('socialite.auth');

    Route::get('auth/{provider}/callback', [SocialiteController::class, 'callbackSocial'])
        ->name('socialite.callback');
});

Route::get('/', function () {
    return view('dashboard');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware('isAdmin')->group(function () {
        Route::get('questions', QuestionList::class)->name('questions');
        Route::get('questions/create', QuestionForm::class)->name('questions.create');
        Route::get('questions/{question}', QuestionForm::class)->name('questions.edit');

        Route::get('quizzes', QuizList::class)->name('quizzes');
        Route::get('quizzes/create', QuizForm::class)->name('quiz.create');
        Route::get('quizzes/{quiz}', QuizForm::class)->name('quiz.edit');
        Route::get('categories', CategoriesList::class)->name('categories.index');
        Route::get('categories/create', CategoriesCreate::class)->name('categories.create');
        Route::get('categories/{category}/edit', CategoriesEdit::class)->name('categories.edit');
        Route::get('products', ProductsList::class)->name('products.index');
    });
});

require __DIR__ . '/auth.php';
