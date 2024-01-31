<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
</head>
<body>
    <h2>Payment Details</h2>

    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('process.payment') }}" method="post">
        @csrf

        <button type="submit" class="btn btn-primary">Process Payment</button>
    </form>
</body>
</html>
