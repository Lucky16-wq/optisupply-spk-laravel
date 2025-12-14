<table>
  <thead><tr><th>No</th><th>Nama Supplier</th><th>Skor</th></tr></thead>
  <tbody>
    @foreach($top5 as $i => $row)
      <tr>
        <td>{{ $i+1 }}</td>
        <td>{{ $row->alternative_name ?? $row['alternative_name'] }}</td>
        <td>{{ number_format($row->score,4) }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
