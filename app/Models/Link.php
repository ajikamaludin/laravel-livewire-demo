<?php

namespace App\Models;

use App\Http\Traits\HasUuidKey;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    use HasFactory, HasUuidKey;

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

    public static function generateCode()
    {
        $code = Str::random(6);
        if (Link::where('code', $code)->count() != 0) {
            $code = Link::generateCode();
        }
        return $code;
    }
}
