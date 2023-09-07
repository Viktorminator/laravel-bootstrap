<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Url extends Model
{
    use HasFactory;
    protected $fillable = ['url','limit', 'ends_at'];
    public function setHashAttribute(): void
    {
        $this->attributes['hash'] = $this->generateShortToken();
    }

    public function setEndsAtAttributes($value): void
    {
        $this->attributes['ends_at'] = Carbon::now()->addHours($value);
    }


    private function generateShortToken($length = 8): string
    {
        $token = '';
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $charactersLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $randomIndex = random_int(0, $charactersLength - 1);
            $token .= $characters[$randomIndex];
        }

        return $token;
    }
}
