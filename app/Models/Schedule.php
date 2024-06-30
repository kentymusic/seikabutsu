<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'state',
        'user_name',
        'email',
        'memo',
        'date',
    ];
    public $timestamps = true;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
