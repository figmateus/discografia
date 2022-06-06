<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'release_date'
    ];

    public function tracks(){
        return $this->hasMany(Track::class, 'album_id', 'id');
    }

    protected $dates = ['release_date'];
    
}
