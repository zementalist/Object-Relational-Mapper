<?php
namespace Core;


use Core\Model;
use Core\Database;



Database::setConnection("host", "username", "password", "dbname");

class User extends Model {
    protected $table = "users"; // table name

    // columns to be filled (receive input)
    // protected $fillable = ['name'];

    // hidden attributes
    protected $hidden = ['password'];

    // grab rows related to this table
    // protected $with = ['other_table_name'];

    // created_at column name (or Null/False)
    const CREATED_AT = 'created_at';
    
     // updated_at column name (or Null/False)
    const UPDATED_AT = 'updated_at';


    // create relations to other tables

    public function posts() {
        return $this->hasMany(Post::class, "user_id", "id");
    }
    public function profile() {
        return $this->hasOne(Profile::class, "profile_id", "id");
    }

    public function hobbies() {
        return $this->belongsToMany(Hobby::class, UserHobby::class, "user_id", "hobby_id")->where("hobby.name", "physiognomy");
    }

    public function country() {
        return $this->belongsTo(Country::class, "user_id", 'id');
    }

}

// $user = new User();
// $user->find(1);
// echo $user;


?>
