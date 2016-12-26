<?php

Route::get('/', 'GameController@homeview');
Route::get('home', 'GameController@homeview');

// ==== NEED LOGIN BEFORE ACCRESS ====

Route::group(['middleware' => ['auth']], function () {
    // admin router
    Route::get('/users', 'User\UserController@users');
    Route::get('/user/block/{id}', 'User\UserController@block');
    Route::get('/results', 'GameController@showResult');

    Route::get('game/{id}', 'GameController@showPlay');
    Route::post('/game/play', 'GameController@submitGame');
    Route::get('user/history', 'User\UserController@gameHistory');

    Route::get('/gametype', 'GametypeController@index');
    Route::get('new-gametype','GametypeController@create');
    Route::post('new-gametype','GametypeController@store');
    Route::get('gametype/{id}', 'GametypeController@show');
    Route::get('/gametype/{id}/edit','GametypeController@edit');
    Route::patch('/gametype/{id}', ['as' => 'gametype.update', 'uses' => 'GametypeController@update']);
    Route::get('/delete_gametype/{id}','GametypeController@destroy');

    Route::get('/gameclone', 'GamecloneController@index');
    Route::get('new-gameclone','GamecloneController@create');
    Route::post('new-gameclone','GamecloneController@store');

    Route::get('/play', 'GameController@index');

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
