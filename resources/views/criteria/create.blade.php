@extends('layouts.app')

@section('content')
<h2>Tambah Kriteria</h2>
<form method="POST" action="{{ route('criteria.store') }}">
  @csrf
  @include('partials._criteria_form')
  <button type="submit">Simpan</button>
</form>
@endsection
