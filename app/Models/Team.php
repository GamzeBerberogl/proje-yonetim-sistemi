<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'logo',
        'leader_id',
    ];
    
    /**
     * Ekibin lideri
     */
    public function leader(): BelongsTo
    {
        return $this->belongsTo(User::class, 'leader_id');
    }
    
    /**
     * Ekip üyeleri
     */
    public function members(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_teams')
                    ->withPivot('role')
                    ->withTimestamps();
    }
    
    /**
     * Ekibe ait görevler
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }
    
    /**
     * Ekibe ait royal pass'ler
     */
    public function royalPasses(): HasMany
    {
        return $this->hasMany(RoyalPass::class);
    }
}
