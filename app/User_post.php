<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_post extends Model
{
     protected $fillable = [
        'user_id','title', 'text',
    ];
    
    public function getByLimit(int $limit_count = 10)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }
    
    public function user()
    {
    return $this->belongsTo('App\User');
    }
}
