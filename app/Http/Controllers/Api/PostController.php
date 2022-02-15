<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
{
    public function index(){

        $posts = Post::paginate(4); //prendo tutti i post
        $tags = Tag::all(); //prendo tutti i tag
        $categories = Category::all(); //prendo tutte le categorie
        return response()->json(compact('posts', 'tags', 'categories'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->with(['category', 'tags'])->first();

        return response()->json($post);
        //genero il json del singolo post in base allo slug
    }

    public function getPostsByCategory($name_category){
        $category = Category::where('name', $name_category)->with('posts.tags')->first();
        
        
        return response()->json($category);
    }

    public function getPostsByTag($name_tag){
        $tag = Tag::where('name', $name_tag)->with('posts.category')->first();
        
        
        return response()->json($tag);
    }
}

