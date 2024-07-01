@extends('layouts.app')

@section('content')
    // ＊投稿できるようになり次第追加:投稿があればforeachで表示
    @if(true)
        <p>ここに投稿一覧が表示されます</p>
    @else
        <div class="prose hero bg-base-200 mx-auto max-w-full rounded">
            <div class="hero-content text-center my-10">
                <div class="max-w-md mb-10">
                    <h2>Welcome to the Instagram Clone</h2>
                    {{-- ユーザー登録ページへのリンク --}}
                    <a class="btn btn-primary btn-lg normal-case" href="{{ route('register') }}">Sign up now!</a>
                </div>
            </div>
        </div>
    @endif
@endsection