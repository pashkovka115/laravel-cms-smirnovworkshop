<?php

namespace App\Models\Product;

use App\Models\CategoryProduct\CategoryProduct;
use App\Models\Product\Attributes\Option;
use App\Models\Product\Attributes\Value;
use App\Models\Product\Attributes\Property;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    use HasFactory;
    use HasSlug;

    protected $table = 'products';
    protected $guarded = ['id'];

    public function additionalFields()
    {
        return $this->hasMany(ProductAdditionalFields::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->hasOne(CategoryProduct::class);
    }


    public function properties()
    {
        return $this->hasMany(
            Property::class,
        );
    }


    public function options()
    {
        return $this->hasMany(Option::class)->with('values');
    }


    public function gallery()
    {
        return $this->hasMany(ProductImages::class)->orderBy('sort');
    }


    public function langAll()
    {
        return $this->hasMany(ProductsDescription::class);
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
            ->saveSlugsTo('slug')
            ->doNotGenerateSlugsOnUpdate(); // Не обновлять
    }
}
