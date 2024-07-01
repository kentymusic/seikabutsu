<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'locate',
        'password',
        'start_date',
        'end_date',
    ];

    public $timestamps = true;

    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('id', 'DESC')->paginate($limit_count);
    }
}


