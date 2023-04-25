<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Assigned extends Model
{
    use HasFactory;

    protected $fillable = [
        'student',
        'start_date',
        'end_date',
    ];

    protected $casts = [
      'start_date' => 'date',
      'end_date' => 'date',
    ];

    public function formatDate(Carbon $date): string
    {
        return $date->format('Y-m-d');
    }

    public function assignment(): BelongsTo
    {
        return $this->belongsTo(Assignment::class);
    }
}
