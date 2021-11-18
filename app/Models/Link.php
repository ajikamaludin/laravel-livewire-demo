<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory;

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'id',
        'name',
        'code',
        'real_link',
        'visit_count',
        'last_visited_at',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
