<?php

use App\Http\Controllers\CasaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\ResetPassword;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;



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

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('/', function () {
	return redirect('/casa');
})->middleware('auth');



//rutas google
Route::get('/login-google', function () {
	return Socialite::driver('google')->redirect();
});



Route::get('/google-callback', function () {
	$user = Socialite::driver('google')->user();

	$userExists = User::where('external_id', $user->getId())->where('external_auth', 'google')->first();
	$userNewExists = User::where('email', $user->email)->first();

	// usuario registrado netamente de google
	if ($userExists) {
		Auth::login($userExists);
		return redirect()->route('casa.index');

	} //usuario registrado  primero en  la pagina y luego en google
	if ($userNewExists) {
		$userNewExists->update([
			'external_id' => $user->getId(),
			'external_auth' => 'google'
		]);
		Auth::login($userNewExists);
		return redirect()->route('casa.index');

	} //usuario nuevo de google 
	else {
		$userNew = User::create([
			'username' => $user->name,
			'email' => $user->email,
			'external_id' => $user->getId(),
			'external_auth' => 'google'
		]);

		$userNew->roles()->sync(2);
		return redirect()->route('change.password', compact('userNew'));
	}


});



Route::get('/', function () {
	return redirect()->route('casa.home');
});


// rutas guest password y loggin
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('register.perform');
Route::get('/login', [LoginController::class, 'show'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login'])->middleware('guest')->name('login.perform');
Route::get('/reset-password', [ResetPassword::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPassword::class, 'send'])->middleware('guest')->name('reset.perform');
Route::get('/change-password/{userNew}', [ChangePassword::class, 'show'])->middleware('guest')->name('change.password');
Route::post('/change-password/{userNew}', [ChangePassword::class, 'update'])->middleware('guest')->name('change.perform');

Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard')->middleware('auth', 'can:dashboard');


Route::get('/principals', [CasaController::class, 'home'])->name('casa.home');

// rutas commentarios
Route::group(['middleware' => 'auth'], function () {
	Route::get('/comment', [CommentController::class, 'index'])->name('comment.index');
	Route::post('/comment/{id}', [CommentController::class, 'store'])->name('comment.store');
	Route::patch('/comment/{comment}', [CommentController::class, 'update'])->name('comment.update');
	Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
});


// Rutas casas
Route::group(['middleware' => 'auth'], function () {
	Route::get('/casa', [CasaController::class, 'index'])->name('casa.index');
	Route::get('/casa/filter', [CasaController::class, 'index'])->name('casa.filter');

	Route::get('/casa/create', [CasaController::class, 'create'])->name('casa.create');
	Route::post('/casa', [CasaController::class, 'store'])->name('casa.store');
	Route::get('/casa/{casa}/edit', [CasaController::class, 'show'])->name('casa.show');
	Route::get('/administer', [CasaController::class, 'administer'])->name('casa.administer');
	Route::get('/casa/{casa}', [CasaController::class, 'edit'])->name('casa.edit');
	Route::patch('/casa/{casa}', [CasaController::class, 'update'])->name('casa.update');
	Route::get('/casa/change_status/{casa}', [CasaController::class, 'change_status'])->name('casa.change_status');
});

// rutas usurios

Route::group(['middleware' => 'auth'], function () {
	Route::get('/users', [UserController::class, 'index'])->name('users.index');
	Route::post('/users', [UserController::class, 'store'])->name('users.store');
	Route::get('/users/{user}', [UserController::class, 'edit'])->name('users.edit');
	Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
	Route::get('/user/change_status/{user}', [UserController::class, 'change_status'])->name('user.change_status');

});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/virtual-reality', [PageController::class, 'vr'])->name('virtual-reality');
	Route::get('/rtl', [PageController::class, 'rtl'])->name('rtl');
	Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
	Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
	Route::get('/profile-static', [PageController::class, 'profile'])->name('profile-static');
	Route::get('/sign-in-static', [PageController::class, 'signin'])->name('sign-in-static');
	Route::get('/sign-up-static', [PageController::class, 'signup'])->name('sign-up-static');
	Route::get('/{page}', [PageController::class, 'index'])->name('page');
	Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
