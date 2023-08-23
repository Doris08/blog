<?php

namespace App\Models;

class Post{
    public static function find($slug){
        if(! file_exists($path = __DIR__ . "/../resources/post/{$slug}.html")){
        //dd('file does not exist');
        //abort(404);
            return redirect('/');
        }

        $post = cache()->remember("posts.{$slug}", 1200, function() use($path){
            file_get_contents($path);
        }); 

    }
}

