<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// boilerplate
class Comment extends Model
{
    use HasFactory, SoftDeletes;

    // Comment belongsTo Post, คอมเม้นต์นี้ เป็นของ โพสต์เดียว (ไม่มี s)
    // ฟังก์ชัน post() คืนค่า ความสัมพันธ์ belongsTo
    // attribute `post` คืนค่า object ของ Model Post
    public function post() {
        return $this->belongsTo(Post::class);
    }
}
