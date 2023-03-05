<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Feedback extends Model
{
    use HasFactory;
    use HasSlug;

    protected $guarded = ['id'];

    public function properties()
    {
        return $this->hasMany(FeedbackProperty::class, 'feedback_id');
    }


    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
