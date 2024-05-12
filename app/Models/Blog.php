<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImg(){
        if ($this->image) {
            return url('uploads/blog/'.$this->image);
        }else {
            return url('uploads/no_image.jpg');
        }
    }

    public function category(){
        return $this->belongsTo(BlogCategory::class, 'category_id', 'id');
    }
}
