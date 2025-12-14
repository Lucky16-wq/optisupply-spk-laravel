@extends('layouts.app')

@section('content')
<h2>Tambah Supplier</h2>
<form method="POST" action="{{ route('alternatives.store') }}">
  @csrf
  @include('partials._alternative_form')
  <button type="submit">Simpan</button>
</form>
@endsection
