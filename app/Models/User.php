<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Eloquent;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\PersonalAccessToken;
use Ospina\CurlCobain\CurlCobain;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $qrCode
 * @property string $google_id
 * @property int $role_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read Role|null $role
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User whereQrCode($value)
 * @method static Builder|User whereRoleId($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasProfilePhoto, TwoFactorAuthenticatable;
    protected $guarded = [];

    /**
     * @return BelongsTo
     */
    public function role (): BelongsTo{
        return $this->belongsTo(Role::class);
    }
    public function getUserInitial (): string
    {
        return $this->name[0];

    }
    public function getUserName (): string
    {
        return $this->name;

    }
    public function getUser (): string
    {

        return 'juan.betancourt';
        return explode('@',$this->email)[0];
    }


    public function getPersonalInfo()
    {
       $client = new CurlCobain(env("API_URL"));
       //TODO: cambiar por user
        $client ->setQueryParam('user',$this->getUser());
        $client ->setQueryParam('api_token','$2y$10$s/9xSDieUMEvYD/gfKqFAeFzvWXt13feXytgpJzQ9rZQrbGpBYUqo');

       $data = $client -> makeRequest();

       return json_decode($data);
    }

    /**
     * Genera un codigo QR seguro y encriptado
     * @param $name
     * @param $email
     * @return string
     */
    public static function generateQrCode ($email) :string{
        $now = Carbon::now()->toDateTimeString();
        $token = $email;
        return Hash::make($token.$now);
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'profile_photo_url',
    ];
}
