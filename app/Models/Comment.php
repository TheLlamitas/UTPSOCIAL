<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Database;

class Comment extends Model
{
    use Database;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];

    public function saveOrUpdate(array $data)
    {
        return $this->persist(Comment::class, $data);
    }
}
