<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MultiImage extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getMultiImg(){
        if ($this->multi_images) {
            return url('uploads/multiple_images/'.$this->multi_images);
        }else {
            return url('uploads/no_image.jpg');
        }
    }
}
