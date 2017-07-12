<?php

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

Route::get('/', function () {
	return view('welcome');
});

// Route::get('save/{princess}', function ($princess) {
// 	return "Sorry, {$princess} is in another castle. :(";
// });

Route::get('save/{princess}', function ($princess) {
	return "Sorry, {$princess} is in another castle. :(";
})->where('princess', '[A-Za-z]+');

Route::get('save/{princess}/{unicorn}', function ($princess, $unicorn) {
	return "{$princess} loves {$unicorn}";
})->where('princess', '[A-Za-z]+')
->where('unicorn', '[0-9]+');


Route::group(['prefix' => 'books'], function () {
// First Route =>/books/first
	Route::get('/first', function () {
		return 'The Colour of Magic';
	});
 // Second Route
	Route::get('/second', function () {
		return 'Reaper Man';
	});
 // Third Route
	Route::get('/third', function () {
		return 'Lords and Ladies';
	});
});

// ko được
Route::group(['domain' => 'myapp.dev'], function () {
	Route::get('my/route', function () {
		return 'Hello from myapp.dev!';
	});
});

Route::group(['domain' => 'another.myapp.dev'], function () {
	Route::get('my/route', function () {
		return 'Hello from another.myapp.dev!';
	});
});

Route::group(['domain' => 'third.myapp.dev'], function () {
	Route::get('my/route', function () {
		return 'Hello from third.myapp.dev!';
	});
});


// 20.Eloquent ORM_216
Route::get('/', function() {
	$game = new \App\Game;
	$game->name = 'Assassins Creed';
	$game->description = 'Assassins VS templars.';
	$game->save();
});


Route::get('/a', function() {
	$game = \App\Game::find(1);
	return $game->name;
});
Route::get('/b', function() {
	// $game = new \App\Game;
	// $game->name = 'Assassins Creed';
	// $game->description = 'Show them what for, Altair.';
	// $game->save();

	// $game = new \App\Game;
	// $game->name = 'Assassins Creed 2';
	// $game->description = 'Requiescat in pace, Ezio.';
	// $game->save();

	// $game = new \App\Game;
	// $game->name = 'Assassins Creed 3';
	// $game->description = 'Break some faces, Connor.';
	// $game->save();

	$array = [
	[
	'name'=>'name1',
	'description' =>'description1'
	],
	[
	'name'=>'name2',
	'description' =>'description1'
	],
	[
	'name'=>'name3',
	'description' =>'description1'
	]
	];
	$array1 = [
	'name'=>'name3',
	'description' =>'description1'
	];

	foreach ($array as $key => $value) {
		$value['created_at'] =new \DateTime();
		$value['updated_at'] =new \DateTime();
		$user = \App\Game::insert($value);
	}
	// $game = new \App\Game;
	// $game->create($array);
	// $user = \App\Game::create($array);
	// $user = \App\Game::insert($array);

});
Route::get('/del', function() {
	$game = \App\Game::find(9);
	$game->delete();
});





