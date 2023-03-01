<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class CategoryProduct extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'categories_product';
    protected $fillable = [
        'title',
        'meta_keywords',
        'meta_description',
        'name_lavel',
        'name',
        'slug',
        'img_announce',
        'img_detail',
        'announce',
        'description',
        'created_at',
        'updated_at',
    ];


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

    /*public function columns()
    {
        return $this->hasOne(CategoryProductColumns::class, '')
    }*/
}
