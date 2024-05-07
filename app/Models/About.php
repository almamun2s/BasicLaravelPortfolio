<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getAboutImg(){
        if ($this->about_image) {
            return url('uploads/home_image/'.$this->about_image);
        }else {
            return url('uploads/no_image.jpg');
        }
    }
}
