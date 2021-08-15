<?php

namespace App\Models;

use App\Traits\Following;
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Following;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function timeline()
    {
        $following = $this->follows->pluck('id');
        return $statuses = Status::whereIn('user_id', $following)
                    ->orWhere('user_id', $this->id)
                    ->latest()
                    ->get();
                    
        // return $statuses = Status::with('user')
        //             ->whereIn('user_id', $following)
        //             ->orWhere('user_id', $this->id)
        //             ->latest()
        //             ->get();
    }

    public function avatars()
    {
        return $gravatar = "https://ui-avatars.com/api/?name=" . $this->name;
    }

    public function makeStatus($string)
    {
        return $this->statuses()->create([
            'body' => $string,
            'identifier' => Str::slug(Str::random(32) . $this->id),
        ]);
    }

    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    // public function follows()
    // {
    //     return $this->belongsToMany(User::class, 'follows', 'user_id', 'following_user_id')->withTimestamps();
    // }

    // public function followers()
    // {
    //     return $this->belongsToMany(User::class, 'follows', 'following_user_id', 'user_id')->withTimestamps();
    // }

    // public function follow(User $user)
    // {
    //     return $this->follows()->save($user);
    // }

    // public function unFollow(User $user)
    // {
    //     return $this->follows()->detach($user);
    //     // Detach : menghapus row di tabel pivot
    //     // Delete : menghapus keselurahan
    // }

    // public function hasFollow(User $user)
    // {
    //     return $this->follows()->where('following_user_id', $user->id)->exists();
    // }
}
