<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .theme-card {
            transition: transform 0.2s;
        }
        .theme-card:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.index') }}">Product Catalog</a>
            <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search products...">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container my-5">
        <h1 class="text-center mb-5">Welcome to Product Catalog</h1>
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($themes as $theme)
                <div class="col">
                    <div class="card h-100 theme-card shadow">
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $theme }}</h3>
                            <p class="card-text">Explore our collection of {{ strtolower($theme) }}</p>
                            <a href="{{ route('products.show', $theme) }}" class="btn btn-primary">
                                View Products
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Product Catalog. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>