<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'phone',
        'profile_picture',
        'company_id'
    ];

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
        'password' => 'hashed',
    ];

    protected $appends = ['profile_image_url', 'sidebar_image_url', 'sidebar_name'];

    /**
     * Get all of the logs for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function logs()
    {
        return $this->hasMany(VisitorLogs::class, 'user_id');
    }
    public function host()
    {
        return $this->hasOne(Host::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    protected function getProfileImageUrlAttribute()
    {

        if ($this->profile_picture) {
            // Return the full URL of the profile picture
            return asset('storage/' . $this->profile_picture);
        } else {
            // Return the default avatar URL
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=555B70&background=F2F4F7&bold=true';
        }
    }
    protected function getSidebarImageUrlAttribute()
    {
        if ($this->company_id == null) {
            return Building::first()->logo_url;
        } else {
            return $this->company->logo_url;
        }
    }
    protected function getSidebarNameAttribute() {
        if ($this->company_id == null) {
            return Building::first()->name;
        } else {
            return $this->company->name;
        }
    }
}
