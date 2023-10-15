<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Notifications\Notifiable;

use Illuminate\Notifications\Notification;
class Product extends Model
{
    use HasFactory;
    use Notifiable;

    public function routeNotificationForMail(Notification $notification): array|string
    {

        return config('products.email');


    }
    protected $guarded = false;
    public function scopeActive(Builder $query): void
    {
        $query->where('status', '=','Available');
    }
}
