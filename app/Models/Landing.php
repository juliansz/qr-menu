<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Landing extends Model
{
    use HasFactory;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'options',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getLinkAttribute()
    {
        return route('landing', $this);
    }

    protected static function booted()
    {
        static::creating(function ($landing) {
            $landing->slug = $landing->slug ? $landing->slug : Str::random(config('qr.random-slug-size'));
        });
    }
}
