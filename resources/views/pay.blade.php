<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center min-h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg text-center w-96">
    
    <h2 class="text-2xl font-bold mb-4">Pembayaran: {{ $product->name }}</h2>
    <p class="text-lg mb-6">Harga: <b>Rp {{ number_format($product->price) }}</b></p>

    @if($qrUrl)
        <img src="{{ $qrUrl }}" alt="QRIS" class="mx-auto mb-6 w-64">
        <p class="text-gray-600">Silakan scan QRIS untuk melakukan pembayaran.</p>
    @else
        <p class="text-red-500 font-semibold">QRIS tidak tersedia.</p>
    @endif

</div>

</body>
</html>
