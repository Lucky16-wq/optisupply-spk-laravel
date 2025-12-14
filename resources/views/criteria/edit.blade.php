@extends('layouts.app')

@section('content')
<h2>Edit Kriteria</h2>
<form method="POST" action="{{ route('criteria.update', $c->id) }}">
  @csrf @method('PUT')
  <input type="hidden" name="id" value="{{ $c->id }}">
  @include('partials._criteria_form', ['c'=>$c])
  <button type="submit">Update</button>
</form>
@endsection
