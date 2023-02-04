<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheVendor extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_uri',
        'vendor_name',
        'vendor_shortdesc',
        'vendore_text',
        'media_id',
        'gallery_id',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable','taggable','taggable_id');
    }
}
