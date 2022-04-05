<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Post::truncate();

        $user = User::factory()->create();

        $personal = Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);

        $work = Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);

        $hobbies = Category::create([
            'name'=>'Hobbies',
            'slug'=>'hobbies'
        ]);
        Post::create([
            'title'=>'My First Post',
            'excerpt'=>'My first post here',
            'body'=>'This is my firs post here, lets check it',
            'slug'=>'my-first-post',
            'user_id'=>$user->id,
            'category_id'=>$personal->id]);

        Post::create([
            'title'=>'My Family Post',
            'excerpt'=>'My family post here',
            'body'=>'This is my family post here, lets check it',
            'slug'=>'my-family-post',
            'user_id'=>$user->id,
            'category_id'=>$personal->id]);

        Post::create([
            'title'=>'My Work Post',
            'excerpt'=>'My work post here',
            'body'=>'This is my work post here, lets check it',
            'slug'=>'my-work-post',
            'user_id'=>$user->id,
            'category_id'=>$work->id]);

        Post::create([
            'title'=>'My Hobby Post',
            'excerpt'=>'My hobby post here',
            'body'=>'This is my hobby post here, lets check it',
            'slug'=>'my-hobby-post',
            'user_id'=>$user->id,
            'category_id'=>$hobbies->id]);

        // \App\Models\User::factory(10)->create();
    }
}
