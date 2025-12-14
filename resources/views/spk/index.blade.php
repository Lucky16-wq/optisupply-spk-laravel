@extends('layouts.app')

@section('content')
<h2>Dashboard SPK - OptiSupply</h2>

<p>Jumlah Kriteria: {{ $criteria->count() }} | Jumlah Supplier: {{ $alternatives->count() }}</p>

<button id="calc">Hitung Skor (SAW)</button>

<table id="result-table" style="margin-top:10px;">
  <thead><tr><th>Rank</th><th>Supplier</th><th>Skor</th></tr></thead>
  <tbody></tbody>
</table>

<script>
$('#calc').on('click', function(){
  $.get('{{ route("spk.calculate") }}', function(data){
    let html = '';
    data.forEach(function(item, idx){
      html += '<tr><td>' + (idx+1) + '</td><td><a href="{{ url('/spk/show') }}/' + item.alternative_id + '">' + item.alternative_name + '</a></td><td>' + item.score.toFixed(4) + '</td></tr>';
    });
    $('#result-table tbody').html(html);
  }).fail(function(){ alert('Gagal menghitung'); });
});
</script>
@endsection
