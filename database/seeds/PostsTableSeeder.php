<?php

use App\Tag;
use App\Post;
use App\Category;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Storage::disk('public')->deleteDirectory('posts');
        Post::truncate();
        Category::truncate();
        Tag::truncate();

        $post = new Post;
        $post->title = "Mi primer post";
        $post->url = str_slug("Mi primer post");
        $post->excerpt = "Esto es un extracto de mi primer post realizado en laravel para mantener pruebas durante el curso de creación de una APP desde 0.";
        $post->body = "<p>Contenido de mi primer post</p>";
        $post->published_at = Carbon::now()->subDays(4);
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 1']));
        $post->categories()->attach(Category::create(['name' => 'Diseño']));

        $post = new Post;
        $post->title = "Mi segundo post";
        $post->url = str_slug("Mi segundo post");
        $post->excerpt = "Esto es un extracto de mi segundo post realizado en laravel para mantener pruebas durante el curso de creación de una APP desde 0.";
        $post->body = "<p>Contenido de mi segundo post</p>";
        $post->published_at = Carbon::now()->subDays(3);
        $post->user_id = 1;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 2']));
        $post->categories()->attach(Category::create(['name' => 'Calzado']));

        $post = new Post;
        $post->title = "Mi tercer post";
        $post->url = str_slug("Mi tercer post");
        $post->excerpt = "Esto es un extracto de mi tercer post realizado en laravel para mantener pruebas durante el curso de creación de una APP desde 0.";
        $post->body = "<p>Contenido de mi tercero post</p>";
        $post->published_at = Carbon::now()->subDays(2);
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 3']));
        $post->categories()->attach(Category::create(['name' => 'Arte']));

        $post = new Post;
        $post->title = "Mi cuarto post";
        $post->url = str_slug("Mi cuarto post");
        $post->excerpt = "Esto es un extracto de mi cuarto post realizado en laravel para mantener pruebas durante el curso de creación de una APP desde 0.";
        $post->body = "<p>Contenido de mi cuarto post</p>";
        $post->published_at = Carbon::now()->subDays(1);
        $post->user_id = 2;
        $post->save();

        $post->tags()->attach(Tag::create(['name' => 'Etiqueta 4']));
        $post->categories()->attach(Category::create(['name' => 'Internacionales']));
    }
}
