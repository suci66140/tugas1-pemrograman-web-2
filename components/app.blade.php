<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header-banner {
            background-color: #0d6efd;
            color: white;
            padding: 35px 0;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-light">
    <div class="header-banner">
        <h1 class="fw-bold">{{ $title ?? 'Product' }}</h1>
    </div>

    <div class="container my-4">
        {{ $slot }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>