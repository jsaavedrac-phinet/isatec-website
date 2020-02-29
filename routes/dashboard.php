<?php

	Route::middleware(['auth','optimizeImages'])->group(function(){
		// CARGA INDEX ADMINISTRADOR
		// Route::post('upload_images','AdminController@imagenes')->name('up_images');
		// Route::post('upload_videos','AdminController@videos')->name('up_videos');
		Route::get('index','AdminController@index')->name('index');
		Route::post('index','AdminController@cambiar_clave')->name('index');
		Route::get('profile','AdminController@profile')->name('profile');
		Route::post('profile','AdminController@edit_profile')->name('edit_profile');
		//OPCIONES DE CONFIGURACION
		Route::name('settings.')->prefix('settings')->group(function(){
			Route::get('/','SettingController@index')->name('index');
			Route::post('/','SettingController@store')->name('store');
        });
        //Banner
        Route::name('banner.')->prefix('banner')->group(function(){
            Route::get('{name}/createOrUpdate','BannerController@create')->name('create');
            Route::post('{name}/createOrUpdate','BannerController@store')->name('store');

        });
        //Static Section
        Route::name('staticSection.')->prefix('staticSection')->group(function(){
            Route::get('{name}/{type}/createOrUpdate','StaticSectionController@create')->name('create')->where('type','[A-Za-z]+');
            Route::post('{name}/{type}/createOrUpdate','StaticSectionController@store')->name('store');

        });
        //Section
        Route::name('section.')->prefix('section')->group(function(){
            Route::get('{name}/{image}/{content}/','SectionController@index')->name('index');
            Route::post('{name}/{image}/{content}/','SectionController@destroy')->name('destroy');
            Route::get('{name}/{image}/{content}/create','SectionController@create')->name('create');
            Route::post('{name}/{image}/{content}/create','SectionController@store')->name('store');
            Route::get('{name}/{image}/{content}/sort','SectionController@sort')->name('sort');
            Route::post('{name}/{image}/{content}/sort','SectionController@order')->name('order');
            Route::get('{name}/{image}/{content}/{section}','SectionController@edit')->name('edit')->where('id', '[0-9]+');
            Route::post('{name}/{image}/{content}/{section}','SectionController@update')->name('update')->where('id', '[0-9]+');
        });

        //Posts
        Route::name('post.')->prefix('post')->group(function(){
            Route::get('{tipo}','PostController@index')->name('index');
            Route::get('{tipo}/create','PostController@create')->name('create');
            Route::post('{tipo}/create','PostController@store')->name('store');
            Route::post('{tipo}','PostController@destroy')->name('destroy');

            Route::get('{tipo}/{post}','PostController@edit')->name('edit')->where('id', '[0-9]+');
            Route::post('{tipo}/{post}','PostController@update')->name('update')->where('id', '[0-9]+');

        });
		// GESTION DEL SLIDER DEL INDEX
		Route::name('slider.')->prefix('slider')->group(function(){
			Route::get('/','SliderController@index')->name('index');
			Route::post('/','SliderController@destroy')->name('destroy');
			Route::get('/create','SliderController@create')->name('create');
			Route::post('/create','SliderController@store')->name('store');
			Route::get('/edit/{slider}','SliderController@edit')->name('edit');
			Route::post('/edit/{slider}','SliderController@update')->name('update');
			Route::get('/sort','SliderController@sort')->name('sort');
            Route::post('/sort','SliderController@order')->name('order');
        });

        //LIBROS VIRTUALES
        Route::name('virtual-book.')->prefix('virtual-book')->group(function(){
            Route::get('/','VirtualBookController@index')->name('index');
            Route::get('create','VirtualBookController@create')->name('create');
            Route::post('create','VirtualBookController@store')->name('store');
            Route::post('/','VirtualBookController@destroy')->name('destroy');

            Route::get('{book}','VirtualBookController@edit')->name('edit')->where('id', '[0-9]+');
            Route::post('{book}','VirtualBookController@update')->name('update')->where('id', '[0-9]+');

        });

        //LIBROS FISICOS
        Route::name('book.')->prefix('book')->group(function(){
            Route::get('/','BookController@index')->name('index');
            Route::get('create','BookController@create')->name('create');
            Route::post('create','BookController@store')->name('store');
            Route::post('/','BookController@destroy')->name('destroy');

            Route::get('{book}','BookController@edit')->name('edit')->where('id', '[0-9]+');
            Route::post('{book}','BookController@update')->name('update')->where('id', '[0-9]+');

        });

        //PROGRAMAS
        Route::name('programs.')->prefix('programs')->group(function(){
            Route::get('/','ProgramController@index')->name('index');
        });
	});
