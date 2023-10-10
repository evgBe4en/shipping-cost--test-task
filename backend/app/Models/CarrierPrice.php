<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarrierPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'carrier_id',
        'min_weight',
        'max_weight',
        'price'
    ];

    public function carrier(): BelongsTo
    {
        return $this->belongsTo(Carrier::class);
    }

}
