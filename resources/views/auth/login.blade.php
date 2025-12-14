@extends('layouts.app')

@section('content')
<h2>Login</h2>

@if(session('success'))
  <div class="success">{{ session('success') }}</div>
@endif

@if($errors->any())
  <div class="error">{{ $errors->first() }}</div>
@endif

<form method="POST" action="{{ route('login.post') }}">
  @csrf

  <div>
    <label>Email</label>
    <input type="email" name="email" required>
  </div>

  <div>
    <label>Password</label>
    <input type="password" name="password" required>
  </div>

  <button type="submit">Login</button>
</form>

<p>Belum punya akun?  
  <a href="{{ route('register') }}">Sign In / Daftar</a>
</p>
@endsection
