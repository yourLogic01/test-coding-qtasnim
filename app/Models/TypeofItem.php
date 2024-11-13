<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeofItem extends Model
{
    use HasFactory;
    protected $table = 'type_of_items';
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
