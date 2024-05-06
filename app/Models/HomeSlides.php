<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlides extends Model
{
    use HasFactory;

    /**
     * These are fillable items to database
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_title',
        'home_image',
        'video_url',
    ];

    public function getHomeImg(){
        if ($this->home_image) {
            return url('uploads/home_image/'.$this->home_image);
        }else {
            return url('uploads/no_image.jpg');
        }
    }
}
