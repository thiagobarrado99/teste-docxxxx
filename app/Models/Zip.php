<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * This is the model class for table "clients".
 *
 * @property string $name Name
 * @property string $phone Phone
 * @property string $email Email
 * @property string $document Document
 * @property string $description Description
 * @property string $origin Origin
 * @property int $type Type
 * @property string $zipcode Zipcode
 * @property int $state_id State ID
 * @property int $city_id City ID
 * @property string $neighborhood Neighborhood
 * @property string $address Address
 * @property string $number Number
 * @property int $created_by Created By
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
