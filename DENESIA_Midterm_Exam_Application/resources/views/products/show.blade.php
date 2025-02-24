<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $theme }} Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .product-card {
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: translateY(-5px);
        }
        .theme-nav {
            background: #f8f9fa;
            padding: 10px 0;
            margin-bottom: 20px;
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

    <div class="theme-nav">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-center gap-3">
                        @foreach($themes as $t)
                            <a href="{{ route('products.show', $t) }}" 
                               class="btn {{ $theme === $t ? 'btn-primary' : 'btn-outline-primary' }}">
                                {{ $t }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-4">
        <div class="row mb-4">
            <div class="col">
                <h1 class="text-center">{{ $theme }} Products</h1>
                <div class="text-center text-muted">
                    Total Products: {{ $totalProducts }} | Average Price: ${{ $averagePrice }}
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($products as $product)
                <div class="col">
                    <div class="card h-100 product-card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">
                                <span class="badge bg-primary">${{ $product['price'] }}</span>
                            </p>
                            <button class="btn btn-outline-primary btn-sm">Add to Cart</button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">
                        No products available for this theme.
                    </div>
                </div>
            @endforelse
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