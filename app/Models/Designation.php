<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = ['company_id', 'name','department_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function hosts()
    {
        return $this->hasMany(Host::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}