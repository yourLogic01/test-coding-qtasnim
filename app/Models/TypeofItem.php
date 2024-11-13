<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeofItem extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function type() {
        return $this->hasMany(Item::class);
    }
}
