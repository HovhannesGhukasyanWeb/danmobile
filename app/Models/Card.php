<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    protected $fillable = [
        "card_number",
        "card_holder_name",
        "expiry_date",
        "cvv",
        "user_id",
        "is_default"
    ];
}
