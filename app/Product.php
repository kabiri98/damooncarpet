<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use Sluggable;
    protected $fillable=[
        'name', 'code','price', 'images','description'
    ];
    protected $guarded = [];

    protected $casts = [
        'images' => 'array'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function path()
    {
        return "admin//product/$this->slug";
    }
}
