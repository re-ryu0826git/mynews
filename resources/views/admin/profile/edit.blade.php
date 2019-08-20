@extends('layouts.profile')

@section('title','プロフィール変更')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール変更</h2>
                <form action= "{{ action('Admin\ProfileController@update')}}" method="post" enctype="multipart/form-data">
                        
                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        
                    <div class="form-group row">
                        <label class="col-md-2" for="name">氏名:</label>
                        <div class="col-md-10">
                            <p>{{ $user->name }}</p>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別:</label>
                        <div class="col-md-10 radio">
                            <label><input type="radio" name="gender" value="男性" {{ $profile_form->gender == '男性' ? 'checked' : '' }}>男性</label>
                            <label><input type="radio" name="gender" value="女性" {{ $profile_form->gender == '女性' ? 'checked' : '' }}>女性</label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" rows="20" value="{{ $profile_form->hobby }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $profile_form->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                {{-- 以下を追記 --}}
                <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>プロフィール編集履歴</h2>
                        <ul class="list-group">
                            @if ($profile_form->profilehistories != NULL)
                                @foreach ($profile_form->profilehistories as $profilehistory)
                                    <li class="list-group-item">{{ $profilehistory->edited_at }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection