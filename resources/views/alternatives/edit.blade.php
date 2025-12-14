@extends('layouts.app')

@section('content')
<h2>Edit Supplier</h2>
<form method="POST" action="{{ route('alternatives.update', $alt->id) }}">
  @csrf @method('PUT')
  @include('partials._alternative_form', ['alt'=>$alt])
  <button type="submit">Perbarui</button>
</form>
@endsection
