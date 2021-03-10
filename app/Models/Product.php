<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;

class Product extends Model
{
    protected $table = 'products';
    public $timestamps = true;
    public $incrementing = true;

    use SoftDeletes, HasSlug;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'shortDescription', 'body', 'shipping', 'inStock', 'metaDescription', 'metaKeywords', 'price', 'extraDescription',
        'length', 'width', 'height', 'weight', 'category_id', 'istint'
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }


    public function resources()
    {
        return $this->morphMany(Resource::class, 'resourceable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function sizeshades()
    {
        return $this->belongsToMany(SizeShade::class, 'product_variants', 'product_id', 'size_shade_id')->withPivot('id');
    }

    public function getDefaultImageAttribute()
    {
        if ($resource = $this->resources()->first()) {
            return $resource->url;
        }

        return url('frontend/images/default-product.jpg');
    }

    public function getDefaultThumbAttribute()
    {
        if ($resource = $this->resources()->first()) {
            return $resource->thumb_url;
        }

        return url('frontend/images/default-product.jpg');
    }

    public function isShippable()
    {
        return $this->weight && $this->length && $this->width && $this->height;
    }

}
