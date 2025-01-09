<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amatch extends Model
{
    use HasFactory;

    public function team1()
    {
        return $this->belongsTo(Team::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Team::class, 'team2_id');
    }

    // Specify the table name since it's different from the default (plural of model name)
    protected $table = 'matches';

    // Other properties and methods...

    // Define the fillable fields that can be mass-assigned
    protected $fillable = [
        'team1_id',
        'team2_id',
        'field',
    ];
}
