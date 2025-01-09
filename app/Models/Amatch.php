<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amatch extends Model
{
    use HasFactory;

    use HasFactory;

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
