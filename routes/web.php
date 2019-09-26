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

Route::get('/', 'IndexController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register1', 'AgentController@register');
Route::get('/admin', 'HomeController@admin')->middleware('auth');
Route::get('/client', 'HomeController@client')->middleware('auth');
Route::get('/agent', 'HomeController@agent')->middleware('auth');
Route::get('/property/status/{id}', 'PropertyController@pStatus')->middleware('Admin');
Route::get('/reports', 'ReportController@index');



Route::resource('/users', 'UserController')->middleware('auth');
Route::resource('/homes', 'PropertyController')->middleware('auth');
Route::resource('/testimony', 'TestimonyController')->middleware('Admin');
Route::resource('/news', 'NewsController')->middleware('Admin');

Route::post('/ustatus/{id}', ['as' => 'status', 'uses' => 'UserController@userstatus'])->middleware('Admin');
Route::post('/pstatus/{id}', ['as' => 'status', 'uses' => 'PropertyController@propertyStatus'])->middleware('Admin');

/*Reports Routes below*/

/* Users Reports*/
Route::get('/user/users', 'ReportController@userslist')->middleware('Admin');
Route::get('/users/user/{id}','ReportController@user')->middleware('Admin');
Route::get('/user/approved', 'ReportController@appuser')->middleware('Admin');
Route::get('/user/pending', 'ReportController@penduser')->middleware('Admin');

/* Property Reports*/
/* Downloading reports*/
Route::get('/homes/home/{id}','ReportController@home')->middleware('Admin');
Route::get('/home/houses','ReportController@propertylist')->middleware('Admin');
Route::get('/home/booked','ReportController@propertybooked')->middleware('Admin');
Route::get('/home/vacant','ReportController@propertyvacant')->middleware('Admin');
Route::get('/home/reserved','ReportController@propertyreserved')->middleware('Admin');
Route::get('/home/repairs','ReportController@propertyunderrepairs')->middleware('Admin');
Route::get('/home/repairs','ReportController@propertyunbookable')->middleware('Admin');
Route::get('/home/unbookable','ReportController@propertyunbookable')->middleware('Admin');
Route::get('/home/bookable','ReportController@propertybookable')->middleware('Admin');

/*
 *<div class="container-fluid" style="padding-top: 15px !important;">

            <div class="row">
                <div class="col-md-6 col-sm-6">
                    @if(count($news)>0)
                        @foreach($news->take(4) as $new)
                            <hr class="new">
                            <div class="row">
                                <div class="col-md-7 col-sm-7">
                                    <a class="card-link" href="{{ route('news.show', $new->id) }}"
                                       title="click here to read this news"><div class="card-title font-weight-bold
                                    text-capitalize" style="color: black;">{{ $new->headline }}
                                        </div></a>
                                </div>
                                <div class="col-md-5 col-sm-5">
                                    <small>{{ $new->created_at->diffForHumans() }}</small>
                                </div>
                            </div>
                            <div class="card-text text-truncate font-italic" style="font-family: 'Times New Roman', serif;">
                                {{ $new->news }}</div>
                        @endforeach
                    @endif
                </div>
                <div class="col-md-6 col-sm-6">
                    @if(count($news)>0)
                        @foreach($updates->take(4) as $new)
                            <hr class="new">
                            <div class="col-md-7 col-sm-7">
                                <a class="card-link" href="{{ route('news.show', $new->id) }}"
                                   title="click here to read this update"><div class="card-title
                                       font-weight-bold text-capitalize" style="color: black;">
                                        {{ $new->headline }}</div></a>
                            </div>
                            <div class="col-md-5 col-sm-5">
                                <small>{{ $new->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="card-text text-truncate font-italic" style="font-family: 'Times New Roman', serif;">{{ $new->news }}</div>
                        @endforeach
                    @endif
                </div>
            </div>
            </div>




 *
 * */
