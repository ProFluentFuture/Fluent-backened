<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Earning extends Model
{
    protected $fillable = ['tutor_id', 'booking_id', 'total_amount', 'commission_amount', 'tutor_amount', 'status'];

    public function tutor(): BelongsTo { return $this->belongsTo(User::class, 'tutor_id'); }
    public function booking(): BelongsTo { return $this->belongsTo(Booking::class); }
}
