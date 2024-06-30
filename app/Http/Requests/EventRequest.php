<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    public function rules()
    {
        return [
            'event.title' => 'required|string|max:255',
            'event.body' => 'required|string|max:4000',
            'event.locate' => 'required|string|max:255',
            'event.password' => 'required|string|max:50',
            'event.start_date' => 'required|date',
            'event.end_date' => 'required|date|after_or_equal:event.start_date',
        ];
    }
}
