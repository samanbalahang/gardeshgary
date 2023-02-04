<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallerymedia extends Model
{
    use HasFactory;
    protected $table = 'DomainRelatedSettings';
    protected $fillable = [
        'gallery_id',
        'media_id',
    ];

}
