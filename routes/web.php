<?php
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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
Route::get('/create', function(){
    $user = User::findorFail(1);
    $post = new Post(["title"=>"My first post", "body"=>"A bit shit"]);
    $user->posts()->save($post);
});
Route::get('/read', function(){
    $user = User::findorFail(1);
    
    //data dump function
    //dd($user->posts);
    foreach($user->posts as $post){
        echo $post->title."<br>";
    }
});
Route::get('/update', function(){
    $user = User::findorFail(1);

    $user->posts()->where('id',1)->update(["title"=>"updated", "body"=>"updated body"]);
});
Route::get('/delete', function(){
    $user = User::findorFail(1);
    //deletes 1
    //$user->posts()->where('id',1)->delete();
    //deletes all
    $user->posts()->delete();
});
