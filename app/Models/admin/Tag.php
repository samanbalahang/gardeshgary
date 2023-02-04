<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\TheVendor;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'tag_uri',
        'tag_name',
        'number_of_used',
        ];

    public function vendors()
    {
        return $this->morphedByMany(TheVendor::class, 'taggable');
    }    
}
