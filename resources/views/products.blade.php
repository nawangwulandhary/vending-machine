<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PisangMania - Landing Page</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-white">

    <!-- NAVBAR -->
    <nav class="w-full bg-white/90 backdrop-blur shadow-sm">
        <div class="max-w-7xl mx-auto flex items-center justify-between p-4">
            <h1 class="text-4xl font-bold text-yellow-600">PisangMania</h1>
            <div class="space-x-6 text-gray-700">
                <a href="{{ route('home') }}" class="hover:text-yellow-300">Home</a>
                <a href="{{ route('products') }}" class="hover:text-yellow-300">Products</a>
            </div>
        </div>
    </nav>
   <!-- SECTION KUNING BESAR PRODUK -->
   <section id="products" class="relative bg-yellow-400 text-center py-28 overflow-hidden">

    <!-- background tulisan besar -->
    <h1 class="text-[180px] font-extrabold text-yellow-300 opacity-40 absolute left-1/2 -translate-x-1/2 top-6 select-none">
        PisangMania
    </h1>

    <!-- judul -->
    <h2 class="text-5xl font-bold text-white relative z-10">Produk Kami</h2>
    </section>

<!-- BAGIAN BG ABU MOTIF (BG1) + PRODUK -->
<div class="relative w-full bg-[#f5f5f5]">

    <!-- MOTIF BG1 -->
    <img src="/images/bg1.jpg"
         class="absolute inset-0 w-full h-full object-cover opacity-20 pointer-events-none">

    <!-- LIST PRODUK DI ATAS BG1 -->
    <section class="relative z-10 py-16">
    <div class="max-w-6xl mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

       @foreach ($products as $product)
                <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 p-4">

                    <!-- Gambar Produk -->
                    <div class="overflow-hidden rounded-lg">
                        <img src="/images/{{ $product->image ?? 'default.jpg' }}"
                             class="rounded-lg w-full h-64 object-cover">
                    </div>

                    <!-- Nama -->
                    <h3 class="font-bold mt-4 text-xl text-gray-800">
                        {{ $product->name }}
                    </h3>

                    <!-- Harga -->
                    <p class="text-gray-600 text-base mb-4">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <!-- Tombol Beli -->
                    <a href="{{ route('bayar.product', $product->id) }}">
                        <button class="bg-yellow-500 hover:bg-yellow-600 text-white font-semibold py-2 px-5 rounded-full transition-all duration-300">
                            Beli Sekarang
                        </button>
                    </a>
                </div>
                @endforeach

    </div>
</section>

</div>
</body>
</html>
