<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function subcategories()
    {
        return $this->hasMany(BlogSubCategory::class, 'category_id');
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'category_id');
    }
}
