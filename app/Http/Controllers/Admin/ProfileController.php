<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //addアクション追加
    public function add()
    {
        return view('admin.profile.create');
    }
    
    //createアクション追加    
    public function create()
    {
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
    
}
