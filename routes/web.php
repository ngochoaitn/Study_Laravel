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

//Route::get('','HomeController@getIndex');

//Test querry
Route::group(['prefix' => 'querry'], function(){

	Route::get('/', function(){
		echo '<a href="querry/getFirstUser">getFirstUser</a></br>';
		echo '<a href="querry/getAllUser">getAllUser</a></br>';
		echo '<a href="querry/insertAUser">insertAUser</a></br>';
		echo '<a href="querry/insertAUser2">insertAUser2</a></br>';
	});

	Route::get('getFirstUser', function(){
		$firstUser=DB::table('demo')->first();
		echo "First user: $firstUser->demo_user";
	});

	Route::get('getAllUser', function(){
		echo "List user:</br>";
		$allUser = DB::table('demo')->get();
		foreach ($allUser as $key) {
			echo "$key->demo_user</br>";
		}
	});

	Route::get('insertAUser', function(){
		$count = DB::table('demo')->count();
		DB::table('demo')->insert([
			"demo_user"=>"user$count",
			"demo_pass"=>"123456"
			]);
		echo "Inserted: user$count";
	});

	Route::get('insertAUser2', 'AddUserController@getViewAddUser');
	Route::post('insertAUser2', 'AddUserController@postAUser');
});

Route::group(['namespace' => 'Admin'], function(){//để đỡ phải ghi Admin\
	//login
	Route::group(['prefix' => 'login', 'middleware'=>'CheckLogin'], function(){
		Route::get('/', 'LoginController@getLogin');
		Route::post('/', 'LoginController@postLogin');
	});
	//admin
	Route::group(['prefix'=>'admin', 'middleware'=>'CheckAdmin'], function(){
		//admin/home
		Route::group(['prefix'=>'home'], function(){
			Route::get('/', 'HomeController@getView');
			Route::get('view', 'HomeController@getView');
			Route::get('logout', 'HomeController@getLogout');
		});
		//Admin/cat
		Route::group(['prefix'=>'cat'], function(){
			Route::get('/', 'CatController@getView');
			Route::get('edit/{id}', 'CatController@getEdit');
			Route::post('edit/{id}', 'CatController@postEdit');
			Route::get('del/{id}', 'CatController@getDel');
		});
	});
});