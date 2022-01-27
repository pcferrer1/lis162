<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'subject', 'content'];

    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::query()->where('title', 'like', '%'.$search.'%')
                ->orWhere('author', 'like', '%'.$search.'%')
                ->orWhere('subject', 'like', '%'.$search.'%')
                ->orWhere('content', 'like', '%'.$search.'%');
    }
}
