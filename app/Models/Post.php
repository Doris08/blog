<?php

namespace App\Models;
use Illuminate\Support\Facades\File;

class Post{
    public static function find($slug){
        if(! file_exists($path = resource_path("post/{$slug}.html"))){
            //dd('file does not exist');
            //throw new ModelNotFoundException();
            //throw new \Exception;
            abort(404);   
        }

        return cache()->remember("posts.{$slug}", 1200, fn() => file_get_contents($path));

    }

    public static function all(){

        $files = File::files(resource_path("post/"));

        return array_map(fn($file) => $file->getContents(), $files);
    
    }
}

