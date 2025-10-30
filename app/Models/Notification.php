<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * This is the model class for table "notifications".
 *
 * @property string $title Title
 * @property string $body Body
 * @property int $user_id User ID
 * @property int $viewed Viewed
 * @property int $expires_at Expires at
 */
class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "title",
        "body",
        "user_id",
        "url",
        "viewed",
        'expires_at'
    ];

    public static function boot()
    {
        self::creating(function($model){
            if(empty($model->expires_at))
            {
                $model->expires_at = date_create()->modify("+7 days")->format("Y-m-d") . " 00:00:00";
            }
        });

        parent::boot();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
