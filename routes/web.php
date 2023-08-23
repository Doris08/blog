<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

    // Lo ponemos dentro de la coleccion porque solo se usa una vez $files = File::files(resource_path("post"));
    //$posts = [];

    // Forma de hacerlo con collections, esta lógica se pasa al método all(); del modelo Post
    /*$posts = collect(File::files(resource_path("post")))
        ->map(function($file){ // usando función de flecha: ->map(fn($file) => YamlFrontMatter::parseFile($file))
            return YamlFrontMatter::parseFile($file);
        })
        ->map(function($document){ // usando función de flecha: ->map(fn($document) => new Post(...)
            return new Post(
                $document->title,
                $document->excerpt,
                $document->date,
                $document->body(),
                $document->slug
            );
        });*/

    // Forma de hacerlo de forma un poco mas limpia para no usar foreach 
    /*$posts = array_map(function($file){

        $document = YamlFrontMatter::parseFile($file);
        
        return new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }, $files);*/


    // Forma de hacerlo con foreach y asignando un objeto Post a un array
    /*foreach ($files as $file) {
        $document = YamlFrontMatter::parseFile($file);
        
        $posts[] = new Post(
            $document->title,
            $document->excerpt,
            $document->date,
            $document->body(),
            $document->slug
        );
    }*/

    //ddd($posts[0]->body);

    /*$document = YamlFrontMatter::parseFile(
        resource_path('post/my-fourth-post.html')
    );*/

    //ddd($document->excerpt);

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