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
        return self::getEncryptedQRCodeData($email, $secretValue);
//        return Hash::make($token.$secretValue);
    }

    public static function getEncryptedQRCodeData($email, $secretValue): string{
        $secretKey= Env('SECRET_KEY');
        $textToEncrypt = $email.$secretValue;
        //Initialization vector is used to ensure that the text is correctly encrypted
        $initializationVector = openssl_random_pseudo_bytes(
            openssl_cipher_iv_length('aes-256-cbc'));
        $ciphertext = openssl_encrypt($textToEncrypt,
            'aes-256-cbc',
            $secretKey, 0,
            $initializationVector);
        return base64_encode($initializationVector . $ciphertext);
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

        public static function updateUsersQRcode($users, $secretValue)
        {
            $now = Carbon::now()->toDateTimeString();
            foreach ($users as $user) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['qrCode' => self::generateQrCode($user->email, $secretValue), 'updated_at' => $now]);
            }
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
