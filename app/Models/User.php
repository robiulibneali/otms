<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    protected static $user;

    public static function createOrUpdateUser($request, $id = null)
    {
        if (isset($id))
        {
            self::$user = User::find($id);
        } else {
            self::$user = new User();
        }

        self::$user->name                 = $request->name;
        self::$user->email                = $request->email;
        self::$user->role                 = $request->role;
        self::$user->mobile               = $request->mobile;
        self::$user->password             = isset($id) ? (isset($request->password) ? bcrypt($request->password) : self::$user->password) : bcrypt($request->password);
        self::$user->profile_photo_path   = fileUpload($request->file('profile_photo_path'), 'user-management/users', isset($id) ? static::find($id)->image : '' );
        self::$user->save();
    }

    public static function deleteUser($id)
    {
        self::$user = User::find($id);
        if (file_exists(self::$user->profile_photo_path))
        {
            unlink(self::$user->profile_photo_path);
        }
        self::$user->delete();
    }
}
