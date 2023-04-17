<?php

namespace App\Models\Product;

use App\Models\Attributes\Group;
use App\Models\Attributes\ItemGroup;
use App\Models\Attributes\ItemVariant;
use App\Models\Attributes\OptionValue;
use App\Models\Attributes\Property;
use App\Models\CategoryProduct\CategoryProduct;
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
        return $this->belongsToMany(
            Property::class
        )->withPivot('value');
    }

    public function optionValues()
    {
        return $this->belongsToMany(OptionValue::class);
    }

    /*public function attributeGroups()
    {
        return $this->belongsToMany(
            Group::class,
            ItemGroup::class,
            'item_id',
            'group_id'
        )->with('attributes');
    }*/


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
