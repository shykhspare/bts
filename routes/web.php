<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;

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


// Front Website Routes 
Route::get('/', [PagesController::class, 'index']);
Route::get('books', [PagesController::class, 'books']);
Route::get('about-us', [PagesController::class, 'aboutus']);
Route::get('contact-us', [PagesController::class, 'contactus']);
Route::get('test', [PagesController::class, 'test']);
Route::get('book/{slug}', [PagesController::class, 'book']);



Route::get('cart', [PagesController::class, 'cart']);

// section pages 
Route::get('section-details/{slug}', [PagesController::class, 'sectiondetails']);
// sub section pages 
Route::get('section/{book_slug}/{section_slug}', [PagesController::class, 'section']);
//author pages
Route::get('authors', [PagesController::class, 'authors']);
Route::get('author/{slug}', [PagesController::class, 'author']);




// order Item Routes 
Route::group(['prefix' => 'items', 'as' => 'items.'], function () {
    Route::any('add', [OrderItemsController::class, 'addtobasket']);
    Route::post('update', [OrderItemsController::class, 'updatetobasket']);
    Route::get('remove/{id}', [OrderItemsController::class, 'removefrombasket']);
    Route::post('quantityupdate', [OrderItemsController::class, 'quantityUpdate']);
    Route::post('removeItemfrombasket/{id}', [OrderItemsController::class, 'removeItemfrombasket']);
    Route::get('edit/{id}', [OrderItemsController::class, 'editorderitem']);
});


// Route::post('login', 'Auth\LoginController@login');
Route::post('login2',  [LoginController::class, 'login2']);
Route::post('Register2',  [LoginController::class, 'Register2']);
Route::get('logout', [LoginController::class, 'logout']);
Route::post('forgot-password', [LoginController::class, 'forgotpassword']);
// end of Front Website Routes 
Route::post('commentpost', [PagesController::class, 'commentpost']);

Route::middleware(['auth'])->group(static function () {
    Route::get('dashboard', [UsersController::class, 'dashbaord'])->name('dashboard');
    Route::get('myorders', [UsersController::class, 'myorders'])->name('myorders');
    Route::get('myaccount', [UsersController::class, 'myaccount'])->name('myaccount');
    Route::post('change-password', [UsersController::class, 'updatePassword'])->name('update-password');
    Route::post('update-profile', [UsersController::class, 'updateProfile'])->name('update-profile');
    Route::get('order-details/{orderNo}', [UsersController::class, 'view'])->name('myorders');
    Route::get('checkout', [OrderHdsController::class, 'checkout']);
    Route::post('process', [OrderHdsController::class, 'processOrder'])->name('process');
});
/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('admin-users')->name('admin-users/')->group(static function () {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('categories')->name('categories/')->group(static function () {
            Route::get('/',                                             'CategoriesController@index')->name('index');
            Route::get('/create',                                       'CategoriesController@create')->name('create');
            Route::post('/',                                            'CategoriesController@store')->name('store');
            Route::get('/{category}/edit',                              'CategoriesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CategoriesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{category}',                                  'CategoriesController@update')->name('update');
            Route::delete('/{category}',                                'CategoriesController@destroy')->name('destroy');
        });
    });
});



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('books')->name('books/')->group(static function () {
            Route::get('/',                                             'BooksController@index')->name('index');
            Route::get('/create',                                       'BooksController@create')->name('create');
            Route::post('/',                                            'BooksController@store')->name('store');
            Route::get('/{book}/edit',                                  'BooksController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BooksController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{book}',                                      'BooksController@update')->name('update');
            Route::delete('/{book}',                                    'BooksController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('settings')->name('settings/')->group(static function () {
            Route::get('/',                                             'SettingsController@index')->name('index');
            Route::get('/create',                                       'SettingsController@create')->name('create');
            Route::post('/',                                            'SettingsController@store')->name('store');
            Route::get('/{setting}/edit',                               'SettingsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SettingsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{setting}',                                   'SettingsController@update')->name('update');
            Route::delete('/{setting}',                                 'SettingsController@destroy')->name('destroy');
        });
    });
});




/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('authors')->name('authors/')->group(static function () {
            Route::get('/',                                             'AuthorsController@index')->name('index');
            Route::get('/create',                                       'AuthorsController@create')->name('create');
            Route::post('/',                                            'AuthorsController@store')->name('store');
            Route::get('/{author}/edit',                                'AuthorsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'AuthorsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{author}',                                    'AuthorsController@update')->name('update');
            Route::delete('/{author}',                                  'AuthorsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('roles')->name('roles/')->group(static function () {
            Route::get('/',                                             'RolesController@index')->name('index');
            Route::get('/create',                                       'RolesController@create')->name('create');
            Route::post('/',                                            'RolesController@store')->name('store');
            Route::get('/{role}/edit',                                  'RolesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'RolesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{role}',                                      'RolesController@update')->name('update');
            Route::delete('/{role}',                                    'RolesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('units')->name('units/')->group(static function () {
            Route::get('/',                                             'UnitsController@index')->name('index');
            Route::get('/create',                                       'UnitsController@create')->name('create');
            Route::post('/',                                            'UnitsController@store')->name('store');
            Route::get('/{unit}/edit',                                  'UnitsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UnitsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{unit}',                                      'UnitsController@update')->name('update');
            Route::delete('/{unit}',                                    'UnitsController@destroy')->name('destroy');
        });
    });
});

Route::post('/copysection', 'App\Http\Controllers\Admin\SectionsController@copySection');
Route::post('/fetchsections', 'App\Http\Controllers\Admin\SectionsController@fetchsections');
Route::post('/copyUnit', 'App\Http\Controllers\Admin\SectionsController@copyUnitt');
Route::post('/create-quiz', 'App\Http\Controllers\Admin\QuizController@createQuiz');
Route::get('/get-quiz', 'App\Http\Controllers\Admin\QuizController@get_quiz');
Route::get('/switchQuestion', 'App\Http\Controllers\Admin\QuizController@switchQuestion');
Route::post('/quiz-result', 'App\Http\Controllers\Admin\QuizController@quiz_result');
Route::get('result/details/{id}', 'App\Http\Controllers\Admin\QuizController@resultDetails');
Route::post('/wrong-questions', 'App\Http\Controllers\Admin\QuizController@wrong_questions');
Route::get('/get-mcqs', 'App\Http\Controllers\Admin\QuizController@get_mcqs');

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('sections')->name('sections/')->group(static function () {
            Route::get('/',                                             'SectionsController@index')->name('index');
            Route::get('/create',                                       'SectionsController@create')->name('create');
            Route::post('/',                                            'SectionsController@store')->name('store');
            Route::get('/{section}/edit',                               'SectionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SectionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{section}',                                   'SectionsController@update')->name('update');
            Route::delete('/{section}',                                 'SectionsController@destroy')->name('destroy');

            // Route::post('/copySection',                              'SectionsController@copySection')->name('copySection');
            Route::post('/copySection',                              function (Request $r) {
                return "sasdf";
            })->name('copySection');
        });
    });
});



/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('questions')->name('questions/')->group(static function () {
            Route::get('/',                                             'QuestionsController@index')->name('index');
            Route::get('/create',                                       'QuestionsController@create')->name('create');
            Route::post('/',                                            'QuestionsController@store')->name('store');
            Route::get('/{question}/edit',                              'QuestionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'QuestionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{question}',                                  'QuestionsController@update')->name('update');
            Route::delete('/{question}',                                'QuestionsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('users')->name('users/')->group(static function () {
            Route::get('/',                                             'UsersController@index')->name('index');
            Route::get('/create',                                       'UsersController@create')->name('create');
            Route::post('/',                                            'UsersController@store')->name('store');
            Route::get('/{user}/edit',                                  'UsersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'UsersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{user}',                                      'UsersController@update')->name('update');
            Route::delete('/{user}',                                    'UsersController@destroy')->name('destroy');
        });
    });
});

\Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('comments')->name('comments/')->group(static function () {
            Route::get('/',                                             'CommentsController@index')->name('index');
            Route::get('/create',                                       'CommentsController@create')->name('create');
            Route::post('/',                                            'CommentsController@store')->name('store');
            Route::get('/{comment}/edit',                               'CommentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CommentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{comment}',                                   'CommentsController@update')->name('update');
            Route::delete('/{comment}',                                 'CommentsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('order-hds')->name('order-hds/')->group(static function () {
            Route::get('/',                                             'OrderHdsController@index')->name('index');
            Route::get('/create',                                       'OrderHdsController@create')->name('create');
            Route::get('/show/{orderNo}',                                       'OrderHdsController@show')->name('show');
            Route::post('/',                                            'OrderHdsController@store')->name('store');
            Route::get('/{orderHd}/edit',                               'OrderHdsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'OrderHdsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{orderHd}',                                   'OrderHdsController@update')->name('update');
            Route::delete('/{orderHd}',                                 'OrderHdsController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('slides')->name('slides/')->group(static function () {
            Route::get('/',                                             'SlidesController@index')->name('index');
            Route::get('/create',                                       'SlidesController@create')->name('create');
            Route::post('/',                                            'SlidesController@store')->name('store');
            Route::get('/{slide}/edit',                                 'SlidesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SlidesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{slide}',                                     'SlidesController@update')->name('update');
            Route::delete('/{slide}',                                   'SlidesController@destroy')->name('destroy');
        });
    });
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function () {
        Route::prefix('tests')->name('tests/')->group(static function () {
            Route::get('/',                                             'TestsController@index')->name('index');
            Route::get('/create',                                       'TestsController@create')->name('create');
            Route::post('/',                                            'TestsController@store')->name('store');
            Route::get('/{test}/edit',                                  'TestsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TestsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{test}',                                      'TestsController@update')->name('update');
            Route::delete('/{test}',                                    'TestsController@destroy')->name('destroy');
        });
    });
});

// test apply
Route::get('/test/{test}', 'TestApplyController@apply')->name('test.apply');
