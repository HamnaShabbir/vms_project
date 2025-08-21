<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $table = 'buildings';
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_number',
        'logo'
    ];
    protected $appends = ['logo_url'];

    protected function getLogoUrlAttribute()
    {

        if ($this->logo) {
            // Return the full URL of the profile picture
            return asset('storage/' . $this->logo);
        } else {
            // Return the default avatar URL
            return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . '&color=555B70&background=F2F4F7&bold=true';
        }
    }
}
