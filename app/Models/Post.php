<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'company', 'location', 'website', 'email', 'description', 'tags']; //moze i $guarded ali je onda obrnuto ili Model::unguard u boot od app service providera pa je sve dopusteno

    public function scopeFilter($query, array $filters) //funkcija se mora nazivati scopeFilter da bi filter() u controlleru radija
    {
        if ($filters['tag'] ?? false) { //ako je $filters['tag'] truty izvrsi kod u zagradama 
            $query->where('tags', 'like', '%' . request('tag') . '%');
        };
        if ($filters['search'] ?? false) { //ako je $filters['tag'] truty izvrsi kod u zagradama 
            $query->where('title', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%');
        };
    }

    //relationship to user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
