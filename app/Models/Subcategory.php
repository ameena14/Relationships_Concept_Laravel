<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_image',
    ];

    public function examples()
    {
        return $this->hasMany(Example::class);
    }

        // In Subcategory model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
