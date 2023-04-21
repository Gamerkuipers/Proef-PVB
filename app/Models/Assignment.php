<?php

namespace App\Models;

use App\Enums\AssignmentStatusses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'target_audience',
        'examples',
        'email',
        'phone_numbers',
        'deadline',
        'company_name',
        'company_description',
        'status',
    ];

    protected $casts = [
        'deadline' => 'date',
        'phone_numbers' => 'collection'
    ];

    public function getPhoneNumbersString(): string
    {
        return $this->phone_numbers->join(', ');
    }

    public function getStatus(): string
    {
        return __(constant("App\Enums\AssignmentStatusses::{$this->status}")->value);
    }
}
