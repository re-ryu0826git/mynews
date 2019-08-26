@extends('layouts.front_profile')
@section('title','プロフィール')

@section('content')
    <div class="container">
        <div class="headline col-md-10 mx-auto">
            <h2>プロフィール</h2>
                <div class="row">            
                    <table>
                        <tr>
                            <th>氏名</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>{{ $profile->gender }}</td>
                        </tr>
                        <tr>
                            <th>趣味</th>
                            <td>{{ $profile->hobby }}</td>
                        </tr>
                        <tr>
                            <th>自己紹介</th>
                            <td>{{ $profile->introduction }}</td>
                        </tr>
                    </table>
                </div>
        </div>
    </div>
@endsection

