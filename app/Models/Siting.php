<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siting extends Model
{
    use HasFactory;

    protected $fillable = [
        'location', 'type',
    ];
}


