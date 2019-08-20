<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Profile;
use App\User;
use App\ProfileHistory;
use Carbon\Carbon;


class ProfileController extends Controller
{
    //addアクション追加
    public function add()
    {
        $user = Auth::user();

        return view('admin.profile.create', ['user' => $user]);
    }
    
    //createアクション追加    
    public function create(Request $request)
    {
            // Validationを行う
            $this->validate($request, Profile::$rules);
        
            $profile = new Profile;
        
            $form = $request->all();
        
            unset($form['_token']);
        
            $profile->fill($form);
            $profile->save();
            
            return redirect('admin/profile/create');
            
    }
    
    public function index(Request $request)
    {
        $user = Auth::user();
        $profile = Profile::where('user_id',$user->id)->latest()->first();
        
        return view('admin.profile.index', ['user' => $user, 'profile' => $profile]);
    }
    
    
    //editアクション追加
    public function edit(Request $request)
    {
        $user = Auth::user();
        //Profile Modelからデータを取得する
        $profile = Profile::where('user_id',$user->id)->latest()->first();
        if (empty($profile)){
            abort(404);
        }
        
        $profilehistory = new ProfileHistory;
        
        
        return view('admin.profile.edit',['profile_form' => $profile, 'user'=> $user ]);
    }
    
    
    // updateアクション追加
    public function update(Request $request)
    {
        //validationをかける
        $this->validate($request, Profile::$rules);
        
        //Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        
        //送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        unset($profile_form['_token']);
        
        //viewファイルにカラムidが記述されているときにfillメソッドを使う
        $profile->fill($profile_form)->save();
        
        //以下を追記
        $profilehistory = new ProfileHistory;
        $profilehistory->profile_id = $profile->id;
        //Carbonを使って取得した現在時刻を、ProfileHistoryモデルのedit_atとして記録する
        $profilehistory->edited_at = Carbon::now();
        
        return redirect('admin/profile');
    }
    
}
