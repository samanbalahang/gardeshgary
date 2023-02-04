<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Media;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'galleries';
    protected $fillable = [
        'uri',
        'name',
    ];

    public function medias()
    {
        return $this->belongsToMany(Media::class, 'gallery_media','gallery_id','media_id');
    }
}
