<?php

//Begin Painel Admin Routes

$this->group(['middleware' => ['auth'],'prefix'=>'painel','namespace'=>'Painel'], function(){
    $this->get('/','HomeController@index')->name('painel.home');
    
    $this->group(['prefix'=>'product'], function(){
        $this->get('/','ProductController@index')->name('painel.product.index');
        $this->get('create','ProductController@create')->name('painel.product.create');
        $this->post('/','ProductController@store')->name('painel.product.store');
        $this->get('{id}','ProductController@show')->name('painel.product.show');
        $this->get('{id}/edit','ProductController@edit')->name('painel.product.edit');
        $this->put('{id}','ProductController@update')->name('painel.product.update');
        $this->delete('{id}', 'ProductController@destroy')->name('painel.product.destroy');
        $this->get('{id}/image/{id_image}','ProductController@imageDestroy')->name('painel.product.image.destory');
        $this->get('{id}/image-main/{id_image}','ProductController@imageMain')->name('painel.product.image.main');
    });

    $this->group(['prefix'=>'type'], function(){
        $this->get('/','TypeController@index')->name('painel.type.index');
        $this->get('create','TypeController@create')->name('painel.type.create');
        $this->post('/','TypeController@store')->name('painel.type.store');
        $this->get('{id}','TypeController@show')->name('painel.type.show');
        $this->get('{id}/edit','TypeController@edit')->name('painel.type.edit');
        $this->put('{id}','TypeController@update')->name('painel.type.update');
        $this->delete('{id}', 'TypeController@destroy')->name('painel.type.destroy');
    });

    $this->group(['prefix'=>'color'], function(){
        $this->get('/','ColorController@index')->name('painel.color.index');
        $this->get('create','ColorController@create')->name('painel.color.create');
        $this->post('/','ColorController@store')->name('painel.color.store');
        $this->get('{id}','ColorController@show')->name('painel.color.show');
        $this->get('{id}/edit','ColorController@edit')->name('painel.color.edit');
        $this->put('{id}','ColorController@update')->name('painel.color.update');
        $this->delete('{id}', 'ColorController@destroy')->name('painel.color.destroy');
    });

    $this->group(['prefix'=>'size'], function(){
        $this->get('/','SizeController@index')->name('painel.size.index');
        $this->get('create','SizeController@create')->name('painel.size.create');
        $this->post('/','SizeController@store')->name('painel.size.store');
        $this->get('{id}','SizeController@show')->name('painel.size.show');
        $this->get('{id}/edit','SizeController@edit')->name('painel.size.edit');
        $this->put('{id}','SizeController@update')->name('painel.size.update');
        $this->delete('{id}', 'SizeController@destroy')->name('painel.size.destroy');
    });

    $this->group(['prefix'=>'budget'],function(){
        $this->get('/','BudgetController@index')->name('painel.budget.index');
        $this->get('{id}','BudgetController@show')->name('painel.budget.show');
    });

    $this->group(['prefix'=>'user'], function(){
        $this->get('/','UserController@index')->name('painel.user.index');
        $this->get('create','UserController@create')->name('painel.user.create');
        $this->post('/','UserController@store')->name('painel.user.store');
        $this->get('{id}','UserController@show')->name('painel.user.show');
        $this->get('{id}/edit','UserController@edit')->name('painel.user.edit');
        $this->put('{id}','UserController@update')->name('painel.user.update');
        $this->delete('{id}','UserController@destroy')->name('painel.user.destroy');
    });
});
//End Painel Admin Routes

//Begin Auth Routes
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout')->middleware('auth');
//End Auth Routes


//Begin Site Routes
$this->get('produtos','Site\SiteController@productsPage')->name('site.products');
$this->get('{slug}', 'Site\SiteController@productDetail')->name('product.detail.page');
$this->post('budget','Painel\BudgetController@store')->name('painel.budget.store');
$this->any('busca-produtos','Site\SiteController@searchProducts')->name('site.search.products');
$this->get('/', 'Site\SiteController@index')->name('site.home');
//End Site Routes


