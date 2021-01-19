<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/***
 * Class Comment
 * @property $post_id Post
 * @property $subject string
 * @property $body string
 */
class Comment extends Model
{
    use HasFactory;
}
