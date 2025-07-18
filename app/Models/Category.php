<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id'
    ];

    public function ads()
    {
        return $this->hasMany(Ad::class);
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getDepthAttribute()
    {
        $depth = 0;
        $parent = $this->parent;

        while ($parent) {
            $depth++;
            $parent = $parent->parent;
        }

        return $depth;
    }
    public static function buildCategoryTree($categories, $parentId = null, $depth = 0)
    {
        $branch = [];

        foreach ($categories as $category) {
            if ($category->parent_id === $parentId) {
                $category->depth = $depth;
                $category->children = self::buildCategoryTree($categories, $category->id, $depth + 1);
                $branch[] = $category;
            }
        }

        return $branch;
    }

}
