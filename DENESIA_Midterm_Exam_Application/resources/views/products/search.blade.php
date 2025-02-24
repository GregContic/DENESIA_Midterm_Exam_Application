<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Product Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.index') }}">Product Catalog</a>
            <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" value="{{ $query }}" placeholder="Search products...">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container my-4">
        <h1>Search Results for "{{ $query }}"</h1>
        
        @if(count($results) > 0)
            <div class="row row-cols-1 row-cols-md-3 g-4 mt-3">
                @foreach($results as $product)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product['name'] }}</h5>
                                <p class="card-text">
                                    <span class="badge bg-secondary">{{ $product['theme'] }}</span>
                                    <span class="badge bg-primary">${{ $product['price'] }}</span>
                                </p>
                                <a href="{{ route('products.show', $product['theme']) }}" 
                                   class="btn btn-outline-primary btn-sm">
                                    View Category
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info mt-4">
                No products found matching your search.
            </div>
        @endif
    </div>

    <footer class="bg-dark text-light py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2024 Product Catalog. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>