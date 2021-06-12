<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

// Livewire
Route::namespace('App\Http\Livewire')->group(function()
{
    // App
    Route::namespace('App')->name('app.')->group(function()
    {
        // Home
        Route::get('/', Home\Index::class)->name('welcome');
            
        // Healthcare Services
        Route::name('healthcare.')->prefix('healthcare')->group(function()
        {
            Route::get('genetic-test', Services\GeneticTest::class)->name('genetic-test');
            Route::get('deep-clinical-assessment', Services\Dca::class)->name('deep-clinical-assessment');
            Route::get('therapeutics', Services\Therapeutics::class)->name('therapeutics');

            Route::namespace('Team')->name('team.')->group(function()
            {
                Route::get('{type}', Index::class)->name('index');
                Route::get('{type}/{url}', Show::class)->name('show');
            });
        });

        // Services
        Route::get('healthcare-services', Services\Index::class)->name('services');
        Route::get('healthcare-services/{url}', Services\Show::class)->name('services.show');

        // Research
        Route::get('research', Research\Index::class)->name('research');
        
        // Blog
        Route::get('blog', Blog\Index::class)->name('blog.index');
        Route::get('blog/{url}', Blog\Show::class)->name('blog.show');
        
        // Gallery
        Route::get('gallery/{identifier?}', Gallery\Index::class)->name('gallery');

        // Career
        Route::get('career', Career\Index::class)->name('career.index');
        Route::get('career/{url}', Career\Show::class)->name('career.show');

        // Appointment
        Route::get('appointment', Appointment::class)->name('appointment');

        // About
        Route::get('about', About\Index::class)->name('about');

        // Contact
        Route::get('contact', Contact\Index::class)->name('contact');
        // Route::get('developer', Developer::class)->name('developer');
        
    });
    
    
    // Admin
    Route::middleware(['auth', 'admin'])->namespace('Admin')->name('admin.')->prefix('admin')->group(function()
    {
        // Dashboard
        Route::get('dashboard', Dashboard::class)->name('dashboard');

        // Blog
        Route::namespace('Blog')->name('blog.')->prefix('blog')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
            
            Route::namespace('Category')->name('category.')->prefix('category')->group(function()
            {
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });
            
            Route::namespace('SubCategory')->name('sub-category.')->prefix('sub-category')->group(function()
            {
                Route::get('create', Create::class)->name('create');
                Route::get('edit/{id}', Edit::class)->name('edit');
            });
        });

        // Team
        Route::namespace('Team')->name('team.')->prefix('team')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });

        // Service
        Route::namespace('Service')->name('service.')->prefix('service')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });

        // Slider
        Route::namespace('Slider')->name('slider.')->prefix('slider')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });

        // OpeningHour
        Route::get('opening-hour', OpeningHour::class)->name('opening-hour');

        // Appoitment
        Route::get('appoitment', Appoitment::class)->name('appoitment');

        // FAQ
        Route::namespace('Faq')->name('faq.')->prefix('faq')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });
        
        // Gallery
        Route::namespace('Gallery')->name('gallery.')->prefix('gallery')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });
        
        // Career
        Route::namespace('Career')->name('career.')->prefix('career')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });
        
        // Research
        Route::namespace('Research')->name('research.')->prefix('research')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });
        
        // About
        Route::get('about', About\Index::class)->name('about');
        
        
        // Text
        Route::namespace('Text')->name('text.')->prefix('text')->group(function(){
            Route::get('create', Create::class)->name('create');
            Route::get('edit/{id}', Edit::class)->name('edit');
        });
        
        // Site Informations
        Route::get('site-informations', SiteInfo::class)->name('site-info');
    });
});


// Controllers
Route::namespace('App\Http\Controllers')->group(function()
{
    // Admin
    Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function()
    {
        // Blog
        Route::name('blog.')->prefix('blog')->group(function(){
            Route::post('store', 'BlogController@store')->name('store');
            Route::post('update/{id}', 'BlogController@update')->name('update');
        });
    });
});



// Laravel Filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
