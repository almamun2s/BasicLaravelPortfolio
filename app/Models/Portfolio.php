<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getImg()
    {
        if ($this->image) {
            return url('uploads/portfolio/' . $this->image);
        } else {
            return url('uploads/no_image.jpg');
        }
    }
}
