@if (Auth::check())

    <li><a class="link link-hover" href="{{ route('index') }}">Users</a></li>

    <li><a class="link link-hover" href="{{ route('searchUser') }}">Search Users</a></li>

    <li><a class="link link-hover" href="#" onclick="event.preventDefault();this.closest('form').submit();">Logout</a></li>
@else
    {{-- ユーザー登録ページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('register') }}">Signup</a></li>
    <li class="divider lg:hidden"></li>
    {{-- ログインページへのリンク --}}
    <li><a class="link link-hover" href="{{ route('login') }}">Login</a></li>
@endif