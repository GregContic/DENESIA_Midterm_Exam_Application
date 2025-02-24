<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $theme }} Products</title>
</head>

<body>
    <h1>{{ $theme }} Products</h1>

    <ul>
        @forelse($products as $product)
            <li>{{ $product['name'] }} - ${{ $product['price'] }}</li>
        @empty
            <li>No products available for this theme.</li>
        @endforelse
    </ul>

</body>

</html>
