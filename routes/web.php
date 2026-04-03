<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{project:code}', function (Project $project) {
    return view('pages.home', compact('project'));
});
