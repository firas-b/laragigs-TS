<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    //relationship user
public function user(){
return $this->belongsTo(User::class,'user_id');
}


    use HasFactory;
 protected $fillable = ['user_id','title','logo','company', 'location', 'website', 'email', 'description', 'tags'];

    public function ScopeFilter($query, array $filter/*the tag varaibale in the request or the search input varaiable*/)
    {
        if ($filter['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filter['search']??false){
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orwhere('description', 'like', '%' . request('search') . '%')
            ->orwhere('tags', 'like', '%' . request('search') . '%');


        }
    }
}

/****
public static function all ()  {

return [
    [
        'id' => 1,
        'title' => 'listing one',
        'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'
    ],
    [
        'id' => 2,
        'title' => 'listing two',
        'description' => '"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."'


    ]
] ;
                                                                                                                                
 

}


public  static function find($id){

    $listings = self::all();
    foreach ($listings as $listing){

        if($listing['id']==$id){return $listing;}
    }
}

 */
