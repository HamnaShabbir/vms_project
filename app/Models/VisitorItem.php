<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorItem extends Model
{
    use HasFactory;
    protected $fillable = ['visitor_id', 'item']; // Include 'item' here to allow mass assignment
// Relationships
public function visitor()
{
    return $this->belongsTo(Visitor::class);
}
}
