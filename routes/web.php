<?php

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
    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('posts/{post}', function ($slug) {

    // Find a post by its slug an pass it to a view called "post"

    return view('post', [
        'post' => Post::find($slug)
    ]);

    /*if(! file_exists($path = __DIR__ . "/../resources/post/{$slug}.html")){
        //dd('file does not exist');
        //abort(404);
        return redirect('/');
    }*/

    //$post = cache()->remember("posts.{$slug}", 1200 /* now()->addMinutes(20) */, fn() => file_get_contents($path));

    /*return view('post', [
        'post' => $post
    ]);*/

})->where('post', '[A-z_\-]+');