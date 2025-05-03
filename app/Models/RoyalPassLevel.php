<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RoyalPassLevel extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'royal_pass_id',
        'level',
        'points_required',
        'name',
        'image',
        'is_premium',
    ];
    
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'level' => 'integer',
        'points_required' => 'integer',
        'is_premium' => 'boolean',
    ];
    
    /**
     * Seviyenin ait olduğu Royal Pass
     */
    public function royalPass(): BelongsTo
    {
        return $this->belongsTo(RoyalPass::class);
    }
    
    /**
     * Seviyedeki ödüller
     */
    public function rewards(): HasMany
    {
        return $this->hasMany(RoyalPassReward::class);
    }
}
