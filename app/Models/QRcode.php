<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class QRcode extends Model
{
    /**
     * Genera un codigo QR seguro y encriptado
     * @param $email
     * @return string
     */
    public static function generateQrCode ($email, $secretValue) :string{
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

        public static function updateUsersQRcode($users, $secretValue) {
//        $upsertData = [];

    $users->qrCode = self::generateQrCode($users->email,$secretValue);
    $users->update();

    }

    use HasFactory;
}



//
//$upsertData = [];
//foreach ($users as $user){
//    $upsertData[] = ['email' => $user->email,
//        'qrCode' => self::generateQrCode($user->email, $secretValue)];
//}
//User::upsert($upsertData, ['email'], ['name', 'qrCode']);
