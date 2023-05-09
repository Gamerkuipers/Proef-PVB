<?php

namespace App\Models;

use App\Enums\AssignmentStatusses;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

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
        'phone_numbers' => 'collection',
        'examples' => 'collection',
    ];

    public function assigneds(): HasMany
    {
        return $this->hasMany(Assigned::class);
    }

    public function getPhoneNumbersString(): string
    {
        return $this->phone_numbers->join(', ');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(AssignmentLog::class);
    }

    public function getImages()
    {
        return Storage::disk('public')->files($this->id);
    }
}
