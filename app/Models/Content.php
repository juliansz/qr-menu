<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
    public const EMBED_TYPE = 'embed';
    public const LINK_TYPE = 'link';
    public const HTML_TYPE = 'html';

    public const TYPES = ['pdf', 'file', 'img', 'embed', 'link', 'html'];

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
}
