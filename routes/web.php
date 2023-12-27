<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ProfileController;
use App\Livewire\AboutMe;
use App\Livewire\CategoriesCreate;
use App\Livewire\CategoriesEdit;
use App\Livewire\CategoriesList;
use App\Livewire\CompaniesCreate;
use App\Livewire\CompaniesEdit;
use App\Livewire\CompaniesList;
use App\Livewire\CompanyUserList;
use App\Livewire\CompanyUsersCreate;
use App\Livewire\CompanyUsersEdit;
use App\Livewire\Home;
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

Route::get('/', Home::class)->name('home');
Route::get('about', AboutMe::class)->name('about_me');

Route::get('/dashboard', Home::class)->middleware([
    // 'auth', 'verified'
])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('companies', CompaniesList::class)->name('companies.index');
    Route::get('categories', CategoriesList::class)->name('categories.index');
    Route::get('categories/create', CategoriesCreate::class)->name('categories.create');
    Route::get('categories/{category}/edit', CategoriesEdit::class)->name('categories.edit');
    Route::get('products', ProductsList::class)->name('products.index');
    Route::get('companies/create', CompaniesCreate::class)->name('companies.create');
    Route::get('companies/{company}/edit', CompaniesEdit::class)->name('companies.edit');
    Route::get('companies/{company}/users', CompanyUserList::class)->name('companies.users.index');

    Route::get('companies/{company}/users/create', CompanyUsersCreate::class)->name('companies.users.create');
    Route::get('companies/{company}/users/edit', CompanyUsersEdit::class)->name('companies.users.edit');


    Route::middleware('isAdmin')->group(function () {
        Route::get('questions', QuestionList::class)->name('questions');
        Route::get('questions/create', QuestionForm::class)->name('questions.create');
        Route::get('questions/{question}', QuestionForm::class)->name('questions.edit');

        Route::get('quizzes', QuizList::class)->name('quizzes');
        Route::get('quizzes/create', QuizForm::class)->name('quiz.create');
        Route::get('quizzes/{quiz}', QuizForm::class)->name('quiz.edit');
    });
});

require __DIR__ . '/auth.php';
