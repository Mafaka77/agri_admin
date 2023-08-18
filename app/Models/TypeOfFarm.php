<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TypeOfFarm extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','name',
    ];
    public function husbandryTypeOfFarm():BelongsTo
    {
        return $this->belongsTo(HusbandryTypeOfFarm::class);
    }
}
