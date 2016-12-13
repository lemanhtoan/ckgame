<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//test translate multi language
// Route::get('/hello', function() {
//   return View::make('pages.about');
// });

// Route::post('/language', array(
//   'before' => 'csrf',
//   'as' => 'language-chooser', 
//   'uses' => 'LanguageController@chooser'
// ));

// Route::post('/language',[
//     'middleware' => 'localetion',
//     'as' => 'language-chooser', 
//     'uses' => 'LanguageController@chooser'
// ]);

// Route::get('/about1', 
//   ['middleware' => 'localetion',
//   'as' => 'language-chooser', 
//   'uses' => 'LanguageController@chooser', function () {
//     return view('pages.about');
// }]);


Route::get('/', function() {
  return View::make('pages.home');
});

Route::get('home', function() {
  return View::make('pages.home');
});

// new-product => call to view catalog/product.blade.php
// Route::get('/new-product', function() {
//   return View::make('catalog.product');
// });

// group common route to group => admin can 

// ==== NEED LOGIN BEFORE ACCRESS ====

Route::group(['middleware' => ['auth']], function () {
  Route::get('/new-product', 'productCurd@create');

  // save product: url => save-product; Controller name => productCurd; Action function method => saveProduct
  Route::post('/save-product', 'productCurd@saveProduct');

  // delete product: url => delete/id; Controller name => productCurd; Action function method => delete
  Route::get('/delete/{id}','productCurd@delete');

  // edit product
  // 1: get edit process: url => edit/id; Controller name => productCurd; Action function method => edit
  // 2: patch update: url => edit/id; Controller name => productCurd; Action function method => update
  Route::get('/edit/{id}','productCurd@edit');
  Route::patch('/edit/{id}', ['as' => 'product.update', 'uses' => 'productCurd@update']);

  // manager contact list
  Route::get('/mcontact', 'ContactController@mContacts');

  // email to contact id
  Route::get('/mailTo/{id}','ContactController@mailTo');

  Route::get('/new-category', function() {
    return View::make('catalog.new-category');
  });

  Route::post('/save-category', 'productCurd@saveCategory');

  Route::get('/delete_cate/{id}','productCurd@delete_cate');

  // profile user
  Route::get('user/{id}', 'User\UserController@showProfile');

  // logout
  Route::get('auth/logout', 'Auth\AuthController@getLogout');

  // blog
  // show new post form
  Route::get('new-post','PostController@create');
  
  // save new post
  Route::post('new-post','PostController@store');

  // edit post form
  Route::get('edit/{slug}','PostController@edit');

  // comment to blog
  // add comment
  Route::post('comment/add', 'CommentController@store');

  // delete comment
  Route::post('comment/delete/{id}', 'CommentController@distroy');

});

// view list products: url => products; Controller name => productCurd; Action function method => products
Route::get('/products', 'productCurd@products');

// show product: url => product/id; Controller name => productCurd; Action function method => showProduct
Route::get('product/{id}', 'productCurd@showProduct');

// search: url => search-products; Controller name => productCurd; Action function method => search => pagination error
Route::resource('/search-products', 'productCurd@search');

// Other static page with layout
// about page
Route::get('/about', function() {
  return View::make('pages.about');
});

// contact page
Route::get('/contact', function() {
  return View::make('pages.contact');
});

// search chuyen link url ve products va sau do sua trong ham products ben controller => post action
// contact sent
Route::post('/send-contact', 'ContactController@create');

// show contact id
Route::get('/show/{id}','ContactController@show');

// Auth
// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// reset password
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

// eloquent learn
// Route::get('/bears', 'BearController@index');
// Route::get('/gets', 'productCurd@index');
// categories
Route::get('/category/{id}','productCurd@productsCate');

Route::get('/categories', 'productCurd@categories');

// display list of posts
Route::get('user/{id}/posts','User\UserController@user_posts')->where('id', '[0-9]+');

// display user's all posts
Route::get('my-all-posts','User\UserController@user_posts_all');

// crop upload image
Route::get('/upload', function() {
  return View::make('pages.upload');
});

Route::post('/upload', function() {
  $file = Input::file('image');
  $file_name = $file->getClientOriginalName();
  if ($file->move('image', $file_name))
  {
    return Redirect::to('jcrop')->with('image', $file_name);
  } else {
    return "Upload error";
  }
  return View::make('pages.upload');
});

Route::get('jcrop', function() {
  return View::make('pages.jcrop')->with('image', 'image/' . Session::get('image'));
});

Route::post('jcrop', function() {
  $quality = 90;
  $src = Input::get('image');
  $img = imagecreatefromjpeg($src);
  $dest = ImageCreateTrueColor(Input::get('w'), Input::get('h'));
  imagecopyresampled($dest, $img, 0, 0, Input::get('x'), Input::get('y'), Input::get('w'), Input::get('h'), Input::get('w'), Input::get('h'));
  imagejpeg($dest, $src, $quality);
  return "<img src= '" . $src . "'>";
});

// facebook auth
Route::get('facebook', function() {
  return "<a href='fbauth'> Login FB </a>";
});

Route::get('fbauth/{auth?}', function($auth = NULL) {
  if ($auth == 'auth') {
    try {
      Hybrid_Endpoint::process();
    } catch (Exception $e) {
      return Redirect::to('fbauth');
    }
    return;
  }
  try {
    $oauth = new Hybrid_Auth(app_path() . '/config/fb_auth.php');
    $provider = $oauth->autheticate('Facebook');
    $profile = $provider->getUserProfile();
  } catch (Exception $e) {
    return $e->getMessage();
  }
  echo 'Hello ' . $profile->firstName . ' ' . $profile->lastName . '<br>';
  echo 'Email ' . $profile->email . '<br>';
  dd($profile);
});

// ajax load
Route::get('getting-data', function() {
  return View::make('test.getting-data');
});

Route::get('tab1', function() {
  if (Request::ajax()) {
    return View::make('test.tab1');
  }
  return Response::error('errors.404');
});

Route::get('tab2', function() {
  if (Request::ajax()) {
    return View::make('test.tab2');
  }
  return Response::error('errors.404');
});