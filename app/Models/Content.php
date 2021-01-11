<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
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
    public const LINK_TYPE = 'link_type';
    public const HTML_TYPE = 'html';

    public function landing()
    {
        return $this->belongsTo(Landing::class);
    }
}
