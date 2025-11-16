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

    <!-- HERO SECTION -->
    <div class="relative w-full h-[550px]">
        <img src="/images/pisang1.jpg" class="w-full h-full object-cover brightness-75">
        
        <div class="absolute inset-0 flex items-center">
            <div class="px-6 ">
                <div <div class="w-[50%] text-left">
                <h2 class="text-8xl font-bold mb-2 text-white">DUNIA</h2>
                <h2 class="text-8xl font-bold mb-6 text-yellow-700">PISANG</h2>
                <p class="text-xl mb-6 text-white">Kunyah Senyummu,<br>Mulai Harimu!</p>
                <a href="{{ route('products') }}" class="px-6 py-3 bg-yellow-700 hover:bg-yellow-700 text-white rounded-lg shadow">
                    Our Product
                </a>
                </div>
            </div>
        </div>
    </div>

    <!-- DESCRIPTION SECTION -->
    <section class="bg-gray-100 py-12">
        <div class="max-w-5xl mx-auto px-6 text-center">
            <p class="text-gray-700">
                Pelopor Buah Tropis Terbaik Indonesia. Sejak 2025, kami menyajikan pisang segar 
                dan olahan sehat dari kebun lokal pilihan.
                Kami berkomitmen menyediakan sumber energi alami terbaik, 
                dari pisang murni, keripik, hingga hidangan lezat lainnya.
            </p>
        </div>
    </section>

</body>
</html>
