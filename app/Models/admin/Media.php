<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\Gallery;


class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo_name',
        'photo_alt',
        'photo_descript',
        'gallery_id',
        'image_path',
        ];

    public function banners()
        {
            return $this->hasMany(Banner::class);
        }

    public function galleries()
    {
        return $this->belongsToMany(Gallery::class, 'gallery_media','gallery_id','media_id');
    }    
}
