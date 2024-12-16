<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\matches;

class Soccermatch extends Model
{
    use HasFactory;

    protected $table = "matches";
}
