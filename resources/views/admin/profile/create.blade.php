@extends('layouts.profile')

@section('title','プロィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール</h2>
                <form action="{{ action('Admin\ProfileController@create') }}" method="post" enctype="multipart/form-data">
                    
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="name">名前:</label>
                        <div class="col-md-10">
                            <p>{{ $user->name }}</p>
                        </div>
                        <input type="hidden" name="user_id" value="{{ $user->id}}">
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="gender">性別:</label>
                        <div class="col-md-10 radio">
                            <label><input type="radio" name="gender" value="男性"> 男性</label>
                            <label><input type="radio" name="gender" value="女性"> 女性</label>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="hobby">趣味:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="hobby" rows="20" value="{{ old('name') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="20">{{ old('introduction') }}</textarea>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="登録">
                </form>
            </div>
        </div>
    </div>
@endsection