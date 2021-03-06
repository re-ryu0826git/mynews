@extends('layouts.admin');
@section('title','プロフィール一覧')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール一覧</h2>
                <form action= "{{ action('Admin\ProfileController@edit')}}" method="get" enctype="multipart/form-data">
                        
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
                            <label><input type="radio" name="gender" value="男性" {{ $profile->gender == '男性' ? 'checked' : '' }}>男性</label>
                            <label><input type="radio" name="gender" value="女性" {{ $profile->gender == '女性' ? 'checked' : '' }}>女性</label>
                        </div>
                        <input type="hidden" name="gender" value="{{ $profile->gender }}">
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味:</label>
                        <div class="col-md-10">
                            <p>{{ $profile->hobby }}</p>
                        </div>
                        <input type="hidden" name="hobby" value="{{ $profile->hobby }}">
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介:</label>
                        <div class="col-md-10">
                            <p>{{ $profile->introduction }}</p>
                        </div>
                        <input type="hidden" name="introduction" value="{{ $profile->introduction }}">
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="変更">
                </form>
            </div>
        </div>
    </div>
@endsection