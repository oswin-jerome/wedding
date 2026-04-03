<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Project extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\ProjectFactory> */
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        "code",
        'name',
        'description',
        'is_active',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('project_files')
            ->useDisk('public'); // or s3
    }
}
