<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug){
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }
    public static function find($slug){

        // Of all the blog posts, find the one with a slug that matches with the one that is requested
        
        
        return static::all()->firstWhere('slug', $slug);

        // Una forma de hacerlo
        /*if(! file_exists($path = resource_path("post/{$slug}.html"))){
            //dd('file does not exist');
            //throw new ModelNotFoundException();
            //throw new \Exception;
            abort(404);   
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));*/

    }

    public static function findOrFail($slug){

        $posts = static::find($slug);

        if(! $posts){
            throw new ModelNotFoundException();
        }

        return $posts;
        
    }

    public static function all(){

        return cache()->rememberForever('posts.all', function(){
            return collect(File::files(resource_path("post")))
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
            })
            ->sortByDesc('date'); //->sortBy('date'); ordena de forma ascendente

        });

        // Otra forma de hacerlo
        /*$files = File::files(resource_path("post/"));

        return array_map(fn($file) => $file->getContents(), $files);*/
    
    }
}

