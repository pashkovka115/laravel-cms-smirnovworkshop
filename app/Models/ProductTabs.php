<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductTabs extends General
{
    use HasFactory;

    protected $table = 'products_tabs';
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     * Сортировка для детальной страницы редактирования
     */
    public function columns()
    {
        return $this->hasMany(ProductColumns::class, 'tab_id')
            ->orderBy('sort_single');
    }
}
