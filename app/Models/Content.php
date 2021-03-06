<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Content extends Model
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
        'type',
        'description',
        'options',
        'landing_id',
        'file_path',
        'thumbnail_path',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'options' => 'array',
    ];

    public const PDF_TYPE = 'pdf';
    public const FILE_TYPE = 'file';
    public const IMAGE_TYPE = 'img';
    public const EMBEDDED_TYPE = 'embedded';
    public const LINK_TYPE = 'link';
    public const HTML_TYPE = 'html';

    public const TYPES = ['pdf', 'file', 'img', 'embedded', 'link', 'html'];

    public function landing()
    {
        return $this->belongsTo(Landing::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFromLanding($query, Landing $landing)
    {
        return $query->where(function ($query) use ($landing) {
            $query->where('landing_id', $landing->id);
        });
    }

    protected static function booted()
    {
        static::creating(function ($content) {
            $content->slug = $content->slug ? $content->slug : Str::random(config('qr.random-slug-size'));
        });
    }

    public function getLinkAttribute()
    {
        return asset('storage/' . $this->file_path);
    }

    public function getThumbnailUrlAttribute()
    {
        return asset('storage/' . $this->thumbnail_path);
    }
}
