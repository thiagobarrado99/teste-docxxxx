<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * This is the model class for table "clients".
 *
 * @property string $from_postcode From Postcode
 * @property string $to_postcode To Postcode
 * @property float $from_weight From Weight
 * @property float $to_weight To Weight
 * @property float $cost Cost
 * @property int $branch_id Branch ID
 * @property int $user_id User ID
 */
class Zip extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'from_postcode', 
        'to_postcode', 
        'from_weight', 
        'to_weight', 
        'cost', 
        'branch_id', 
        'user_id',
        'created_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
