<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'email', 'website', 'description', 'tags'];

    public function scopeFilter($query, array $filters) {
        if($filters['department'] ?? false) {
            $query->where('department', 'like', '%' . request('department') . '%');
        }

        if($filters['search'] ?? false) {
            $query->where('report_name', 'like', '%' . request('search') . '%')
            ->orWhere('description', 'like', '%' . request('search') . '%')
            ->orWhere('department', 'like', '%' . request('search') . '%');
        }
    }

    // // Relationship to User
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
