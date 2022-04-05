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
//
        $personal = Category::create([
            'name'=>'Personal',
            'slug'=>'personal'
        ]);

        $work = Category::create([
            'name'=>'Work',
            'slug'=>'work'
        ]);

        Post::factory(5)->create(['user_id'=>$user->id, 'category_id'=>$personal->id]);
        Post::factory(5)->create(['user_id'=>$user->id, 'category_id'=>$work->id]);
//        Post::create([
//            'title'=>'My First Post',
//            'excerpt'=>'My first post here',
//            'body'=>'<p>This is my firs post here, lets check it. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
//            'slug'=>'my-first-post',
//            'user_id'=>$user->id,
//            'category_id'=>$personal->id]);
//
//        Post::create([
//            'title'=>'My Family Post',
//            'excerpt'=>'My family post here',
//            'body'=>'<p>This is my family post here, lets check it. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
//            'slug'=>'my-family-post',
//            'user_id'=>$user->id,
//            'category_id'=>$personal->id]);
//
//        Post::create([
//            'title'=>'My Work Post',
//            'excerpt'=>'My work post here',
//            'body'=>'</p>This is my work post here, lets check it. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
//            'slug'=>'my-work-post',
//            'user_id'=>$user->id,
//            'category_id'=>$work->id]);
//
//        Post::create([
//            'title'=>'My Hobby Post',
//            'excerpt'=>'My hobby post here',
//            'body'=>'<p>This is my hobby post here, lets check it. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
//            'slug'=>'my-hobby-post',
//            'user_id'=>$user->id,
//            'category_id'=>$hobbies->id]);

    }
}
