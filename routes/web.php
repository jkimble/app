<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Todos;
use App\Livewire\Counter;
use App\Livewire\CreatePosts;
use App\Livewire\CreateUser;
use App\Livewire\EditProfile;
use App\Livewire\ShowPosts;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*
Route::get('/counter',  function () {{
    return view('counter');
}});
*/
Route::get('/', Todos::class);
Route::get('/counter', Counter::class);
Route::get('/posts', ShowPosts::class);
//Route::get('/posts/create', CreatePosts::class);
Route::get('/posts/create', CreatePosts::class);
// this works bc in the livewire classes, the views are returned in the render functionn
Route::get('/register', CreateUser::class);
Route::get('/edit-profile', EditProfile::class);