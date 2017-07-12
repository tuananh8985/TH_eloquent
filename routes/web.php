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
Route::get('/create', function() {
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


Route::get('/seed', function() {
	$album = new \App\Album;
	$album->title = 'Some Mad Hope';
	$album->artist = 'Matt Nathanson';
	$album->genre = 'Acoustic Rock';
	$album->year = 2007;
	$album->save();

	$album = new \App\Album;
	$album->title = 'Please';
	$album->artist = 'Matt Nathanson';
	$album->genre = 'Acoustic Rock';
	$album->year = 1993;
	$album->save();

	$album = new \App\Album;
	$album->title = 'Leaving Through The Window';
	$album->artist = 'Something Corporate';
	$album->genre = 'Piano Rock';
	$album->year = 2002;
	$album->save();

	$album = new \App\Album;
	$album->title = 'North';
	$album->artist = 'Something Corporate';
	$album->genre = 'Piano Rock';
	$album->year = 2002;
	$album->save();

	$album = new \App\Album;
	$album->title = '...Anywhere But Here';
	$album->artist = 'The Ataris';
	$album->genre = 'Punk Rock';
	$album->year = 1997;
	$album->save();

	$album = new \App\Album;
	$album->title = '...Is A Real Boy';
	$album->artist = 'Say Anything';
	$album->genre = 'Indie Rock';
	$album->year = 2006;
	$album->save();
});


Route::get('/album/list', function() {
	$album = \App\Album::find(1);
	return $album->title;
});
Route::get('/album/all', function() {
	$albums = \App\Album::all();
	foreach ($albums as $album) {
		echo $album->title;
	}
});

Route::get('/album/all1', function() {
	return \App\Album::whereNested(function($query)
	{
		$query->where('year', '>', 2000);
		$query->where('year', '<', 2007);
	})
	->get();


	// $a =  \App\Album::where('title', 'LIKE', '...%')
	// ->orWhere('artist', '=', 'Something Corporate')
	// ->get();
	// dd($a);

});







