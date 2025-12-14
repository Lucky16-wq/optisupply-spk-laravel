@extends('layouts.app')

@section('content')
<h2>Manajemen Kriteria</h2>
<a href="{{ route('criteria.create') }}" class="ajax-link" data-url="{{ route('criteria.create') }}">Tambah Kriteria</a>
@if(session('success')) <div class="success">{{ session('success') }}</div> @endif
<table>
  <thead><tr><th>Nama</th><th>Jenis</th><th>Bobot</th><th>Aksi</th></tr></thead>
  <tbody>
    @foreach($criteria as $c)
    <tr>
      <td>{{ $c->name }}</td>
      <td>{{ $c->type }}</td>
      <td>{{ $c->weight }}</td>
      <td>
        <a href="{{ route('criteria.edit',$c->id) }}" class="ajax-link" data-url="{{ route('criteria.edit',$c->id) }}">Edit</a>
        <form action="{{ route('criteria.destroy',$c->id) }}" method="POST" style="display:inline;">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Hapus?')">Hapus</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
