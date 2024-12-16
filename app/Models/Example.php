<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Example extends Model
{

    use HasFactory;

    // Add the 'name' field to the fillable array
    protected $fillable = ['name', 'subcategory_id', 'description', 'image'];
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

}
