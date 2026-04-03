<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{project:code}', function (Project $project) {
    if (! $project->is_active) {
        abort(404);
    }

    return view('pages.home', compact('project'));
});

Route::get('/{project:code}/banner', function (Project $project) {
    if (! $project->is_active) {
        abort(404);
    }

    return view('pages.banner', compact('project'));
});
