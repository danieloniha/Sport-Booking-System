<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sport(){
        return $this->belongsTo(Sport::class);
    }

    public function field(){
        return $this->belongsTo(Field::class);
    }
}
