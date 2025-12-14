<div>
  <label>Nama Supplier</label>
  <input type="text" name="name" value="{{ $alt->name ?? old('name') }}" required>
</div>
<div>
  <label>Deskripsi</label>
  <textarea name="description">{{ $alt->description ?? old('description') }}</textarea>
</div>

<h3>Nilai Kriteria</h3>
@php $criteriaAll = \App\Models\Criterion::all(); @endphp
@foreach($criteriaAll as $c)
  @php
    $existing = isset($alt) ? $alt->values->firstWhere('criterion_id',$c->id) : null;
  @endphp
  <div>
    <label>{{ $c->name }} ({{ $c->type }})</label>
    <input type="number" step="0.01" name="values[{{ $c->id }}]" value="{{ $existing->value ?? old('values.'.$c->id) ?? 0 }}" required>
  </div>
@endforeach
