<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $theme }} Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <!-- Theme Navigation -->
        <div class="mb-4">
            <h3>Browse Themes:</h3>
            <div class="d-flex gap-2">
                @foreach($themes as $t)
                    <a href="{{ route('products.show', $t) }}" 
                       class="btn {{ $theme === $t ? 'btn-primary' : 'btn-outline-primary' }}">
                        {{ $t }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Theme Header -->
        <h1 class="mb-4">{{ $theme }} Products</h1>

        <!-- Products Display -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @forelse($products as $product)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product['name'] }}</h5>
                            <p class="card-text">
                                Price: ${{ $product['price'] }}
                            </p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>