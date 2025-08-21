<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function hosts()
    {
        return $this->hasMany(Host::class);
    }
}