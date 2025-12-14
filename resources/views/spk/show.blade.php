@extends('layouts.app')

@section('content')
<h2>Detail Supplier: {{ $alt->name }}</h2>
<p>{{ $alt->description }}</p>

<table>
  <thead><tr><th>Kriteria</th><th>Nilai</th></tr></thead>
  <tbody>
    @foreach($alt->values as $v)
      <tr><td>{{ $v->criterion->name }}</td><td>{{ $v->value }}</td></tr>
    @endforeach
  </tbody>
</table>
@endsection
