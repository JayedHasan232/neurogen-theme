<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function author()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    
    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
    
    public function subcategory()
    {
        return $this->belongsTo(BlogSubCategory::class, 'sub_category_id');
    }
}
