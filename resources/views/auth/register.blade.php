@extends('layouts.app')

@section('content')
<h2>Sign In / Registrasi User</h2>

@if ($errors->any())
  <div class="error">
    @foreach ($errors->all() as $error)
      <div>{{ $error }}</div>
    @endforeach
  </div>
@endif

<form method="POST" action="{{ route('register.post') }}">
  @csrf

  <div>
    <label>Nama Lengkap</label>
    <input type="text" name="name" required>
  </div>

  <div>
    <label>Email</label>
    <input type="email" name="email" required>
  </div>

  <div>
    <label>Password</label>
    <input type="password" name="password" required>
  </div>

  <div>
    <label>Konfirmasi Password</label>
    <input type="password" name="password_confirmation" required>
  </div>

  <button type="submit">Daftar</button>
</form>

<p>Sudah punya akun?  
  <a href="{{ route('login') }}">Login di sini</a>
</p>
@endsection
