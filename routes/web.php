<?php
use App\Channels;

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
Auth::routes();

Route::get('/home','HomeController@index')->name('home');
Route::resource('channels','ChannelsController');

/*Route::get('add-media-to-library',function (){
    Channels::create()->addMedia(storage_path('/'))->toMediaConllection();
});*/


Route::middleware(['auth'])->group(function(){
    Route::resource('channels/{channel}/subscriptions','SubscriptionController')->only(['store','destroy']);
    Route::get('channels/{channels}/videos','UploadVideoController@index')->name('channelUpload');
    Route::post('channel/{channel}/videos','UploadVideoController@store');

});
