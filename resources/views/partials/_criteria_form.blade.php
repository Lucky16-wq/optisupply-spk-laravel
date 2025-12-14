<div>
  <label>Nama</label>
  <input type="text" name="name" value="{{ $c->name ?? old('name') }}" required>
</div>
<div>
  <label>Jenis</label>
  <select name="type">
    <option value="benefit" {{ (isset($c) && $c->type=='benefit') ? 'selected' : '' }}>Benefit</option>
    <option value="cost" {{ (isset($c) && $c->type=='cost') ? 'selected' : '' }}>Cost</option>
  </select>
</div>
<div>
  <label>Bobot (misal 0.25)</label>
  <input type="number" step="0.01" name="weight" value="{{ $c->weight ?? old('weight', 1.0) }}" required>
</div>
