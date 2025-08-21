<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorPolicy extends Model
{
    use HasFactory;
    
    protected $table = 'visitor_policies';
    protected $fillable = ['title', 'description', 'attachment'];
}
