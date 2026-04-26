<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    protected $fillable = ['booking_id', 'student_id', 'tutor_id'];

    public function student(): BelongsTo { return $this->belongsTo(User::class, 'student_id'); }
    public function tutor(): BelongsTo { return $this->belongsTo(User::class, 'tutor_id'); }
    public function booking(): BelongsTo { return $this->belongsTo(Booking::class); }
    public function messages(): HasMany { return $this->hasMany(Message::class); }
}
