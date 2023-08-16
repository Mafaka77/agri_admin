<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Village extends Model
{
    use HasFactory;
    protected $fillable=[
        'id','village_name','village_lgd_code','block_id'
    ];

    public function block():BelongsTo
    {
        return $this->belongsTo(Block::class);
    }

    public function farmers():HasOne
    {
        return $this->hasOne(Farmers::class);
    }
}
