<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>OptiSupply - SPK Supplier UMKM</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/modern-normalize/modern-normalize.css">
  <style> body{font-family: Arial, sans-serif; padding:20px;} nav a{margin-right:10px;} table{border-collapse:collapse;width:100%;} table th,table td{border:1px solid #ddd;padding:8px;} .success{color:green;} .error{color:red;} </style>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
</head>
<body>
  <header>
    <h1>OptiSupply</h1>
    <nav>
      <a href="#" class="ajax-link" data-url="{{ route('spk.index') }}">Dashboard</a>
      <a href="#" class="ajax-link" data-url="{{ route('spk.top5') }}">Top 5</a>
      <a href="#" class="ajax-link" data-url="{{ route('criteria.index') }}">Kriteria</a>
      <a href="#" class="ajax-link" data-url="{{ route('alternatives.index') }}">Alternatif</a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:inline;">
        @csrf
        <button type="submit">Logout</button>
      </form>
    </nav>
  </header>

  <main id="content" style="margin-top:20px;">
    @yield('content')
  </main>

<script>
$(document).ready(function(){
  $('a.ajax-link').on('click', function(e){
    e.preventDefault();
    let url = $(this).data('url');
    $.get(url, function(html){
      $('#content').html(html);
      history.pushState({}, '', url);
    }).fail(function(){ alert('Gagal memuat konten'); });
  });

  // handle browser back
  window.onpopstate = function() { location.reload(); };
});
</script>
</body>
</html>
