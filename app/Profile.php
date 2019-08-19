<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = array('id');
    
    // 以下を追記
    public static $rules = array(
        'user_id' => 'required',
        'gender' => 'required',
        'hobby' => 'required',
        'introduction' => 'required',
        );
        
    // 以下を追記
    // Userモデルに関連付けを行う
    public function users()
    {
        return $this->hasOne('App\User');
    }
        
}
