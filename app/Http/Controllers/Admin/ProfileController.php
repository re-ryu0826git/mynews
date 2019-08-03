<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;

class ProfileController extends Controller
{
    //addアクション追加
    public function add()
    {
        return view('admin.profile.create');
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
    
    //editアクション追加
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    // updateアクション追加
    public function update()
    {
        return redirect('admin/profile/edit');
    }
    
}
