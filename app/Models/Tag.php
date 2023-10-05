<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    /*
     * + ฟังก์ชัน posts() คืนค่าความสัมพันธ์ belongsToMany
     * + attribute posts คืนค่า Collection ของ Post
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}
