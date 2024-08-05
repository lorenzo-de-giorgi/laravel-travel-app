<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'travel_id',
    ];

    public function travel()
    {
        return $this->belongsTo(Travel::class);
    }
}
