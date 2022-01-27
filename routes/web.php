<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Test\Trainings;
use App\Http\Livewire\Crud;
use App\Http\Controllers\TrainingUpdatesController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/', function () {
//     return view('index');
// })->middleware(['auth'])->name('dashboard');
Route::get('/', [TrainingUpdatesController::class, 'home'])->name('dashboard');
Route::get('/dashboard', [TrainingUpdatesController::class, 'home'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    
    
    Route::get('students', Crud::class)->name('students');
    Route::get('training', Trainings::class)->name('training');
    Route::resource('trainingupdates', TrainingUpdatesController::class);
    Route::view('tailwind', 'tailwind');
    Route::view('components', 'components');
    Route::view('tailwindmodal', 'tailwind_modal');
    Route::view('flowbitetable', 'flowbite_table');
    Route::view('blog', 'blog_post');
    Route::view('flextailwind', 'flex-tailwind');
});

Route::view('training/show/{trainingID}', 'livewire.test.show')->name('training_show');


// Route::livewire('training/show/{id}', 'livewire.test.show')->name('training_show');

// Route::get('students', Crud::class)->middleware('auth')->name('students');
// Route::get('training', Trainings::class);



require __DIR__.'/auth.php';
