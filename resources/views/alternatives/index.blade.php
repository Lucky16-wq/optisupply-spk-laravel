@extends('layouts.app')

@section('content')
<h2>Manajemen Supplier</h2>
<a href="{{ route('alternatives.create') }}" class="ajax-link" data-url="{{ route('alternatives.create') }}">Tambah Supplier</a>
@if(session('success')) <div class="success">{{ session('success') }}</div> @endif
<table>
  <thead><tr><th>Nama</th><th>Deskripsi</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($alternatives as $alt)
    <tr>
      <td>{{ $alt->name }}</td>
      <td>{{ $alt->description }}</td>
      <td>
        <a href="{{ route('alternatives.edit',$alt->id) }}" class="ajax-link" data-url="{{ route('alternatives.edit',$alt->id) }}">Edit</a>
        <form action="{{ route('alternatives.destroy',$alt->id) }}" method="POST" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
