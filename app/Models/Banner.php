<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Banner extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['uuid', 'title', 'image', 'ordinal_no', 'start_datetime', 'end_datetime', 'is_active'];

    protected $hidden = ['id'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string)Str::uuid();
        });
    }
}
