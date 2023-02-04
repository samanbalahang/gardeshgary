<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id',
        'cat_name',
        'cat_parent_id',
    ];
    public function parent() {
        return $this->belongsToOne(static::class, 'cat_parent_id');
    }
    
    //each category might have multiple children
    public function children() {
       return $this->hasMany(static::class, 'cat_parent_id')->orderBy('cat_name', 'asc');
    }
}
