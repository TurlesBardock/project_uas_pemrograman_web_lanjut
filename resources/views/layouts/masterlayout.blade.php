<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'websiteku<3')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</head>
<body>
    {{-- navbar dimulai disini --}}
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">beranda</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/kedua">tentan kami</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/fitur">fitur</a>
        </li>
        
      </ul>
      <span class="navbar-text">
        masuk
      </span>
    </div>
  </div>
</nav>
{{-- navbar berakhir disini --}}

{{-- mulai ngonten disini --}}
<main style="margin-left: 20px; margin-right: 20px" >
@yield('content')
</main>
{{-- konten berakhir disini --}}

{{-- footer dimulai disini --}}
<div class="container">
      <footer
        class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"
      >
        <p class="col-md-4 mb-0 text-body-secondary">
          &copy; 2025 Company, Inc
        </p>
        <a
          href="/"
          class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none"
          aria-label="Bootstrap"
        >
          <svg class="bi me-2" width="40" height="32" aria-hidden="true">
            <use xlink:href="#bootstrap"></use>
          </svg>
        </a>
        <ul class="nav col-md-4 justify-content-end">
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Features</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">Pricing</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">FAQs</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link px-2 text-body-secondary">About</a>
          </li>
        </ul>
      </footer>
    </div>
    {{-- footer berakhir disini --}}
</body>
</html>