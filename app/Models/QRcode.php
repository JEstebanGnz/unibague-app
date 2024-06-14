<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class QRcode extends Model
{
    /**
     * Genera un codigo QR seguro y encriptado
     * @param $email
     * @return string
     */
    public static function generateQrCode ($email, $secretValue = null) :string{
//        $now = Carbon::now()->toDateTimeString();
        if ($secretValue === null){
            $secretValue = self::generateSecretValue();
        }
        $token = $email;
        return Hash::make($token.$secretValue);
    }

    /**
     * Generates a secret value that changes every day, it allows the QR to be dynamic
     * @return int
     */
    public static function generateSecretValue() :int{
        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $day = $now->day;
        $magicNumber = Env('MAGIC_NUMBER');
        return ($day + $month) * $year * $magicNumber;
    }

    public static function updateUsersQRcode() {
        // Increase max execution time to prevent the cronjob to fail
        set_time_limit(1000);
        $secretValue = self::generateSecretValue();
        $batchSize = 100; // Processes 100 users at a time
        User::chunk($batchSize, function ($users) use ($secretValue) {
            foreach ($users as $user){
                $user->qrCode = self::generateQrCode($user->email, $secretValue);
                $user->save();
            }
        });
    }
    use HasFactory;
}
