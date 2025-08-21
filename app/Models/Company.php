<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';

    protected $fillable = [
        'company_name',
        'company_email',
        'phone',
        'logo',
        'website',
        'visitor_policy',
        'timezone',
        'status',
        'address',
    ];
    protected $appends = ['logo_url'];

    protected function getLogoUrlAttribute()
    {

        if ($this->logo) {
            // Return the full URL of the profile picture
            return asset('storage/' . $this->logo);
        } else {
            // Return the default avatar URL
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->company_name) . '&color=555B70&background=F2F4F7&bold=true';
        }
    }
    /**
     * Get all of the users for the Company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'company_id');
    }
    public function admin()
    {
        return $this->hasOne(User::class, 'company_id')->where('role', 'admin');
    }



    // new =======================================================
    // and also make comapny belongTo relation in visitor table
    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }
}
