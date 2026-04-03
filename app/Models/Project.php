<?php

namespace App\Models;

use Database\Factories\ProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Project extends Model implements HasMedia
{
    /** @use HasFactory<ProjectFactory> */
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'code',
        'name',
        'description',
        'is_active',
    ];

    public function wishes()
    {
        return $this->hasMany(Wish::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('project_files')
            ->useDisk('public'); // or s3
    }

    public function registerMediaConversions(?Media $media = null): void
    {
        $this
            ->addMediaConversion('thumb')
            ->performOnCollections('project_files')
            ->fit(Fit::Crop, 400, 400) // 👈 keeps aspect ratio clean
            ->sharpen(10)
            ->nonQueued()
            ->optimize();
    }
}
