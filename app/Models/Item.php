<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function type()
    {
        return $this->belongsTo(TypeofItem::class,'type_of_item_id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
