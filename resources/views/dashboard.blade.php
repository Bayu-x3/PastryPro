<x-app-layout>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-4">
                        {{ __("You're logged in!") }}
                    </div>

                    <h3 class="mb-4">Menu Pastry</h3>

                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @elseif (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <div class="row">
                        @foreach($pastries->take(6) as $pastry) <!-- Menampilkan maksimum 6 item -->
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="card border-0 shadow-sm transition-transform transform hover:scale-105">
                                    <img src="{{ asset('images/' . $pastry->image) }}" class="card-img-top" alt="{{ $pastry->name }}" style="height: 200px; object-fit: cover;">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $pastry->name }}</h5>
                                        <p class="card-text">{{ Str::limit($pastry->description, 100) }}</p>
                                        <p class="card-text"><strong>Harga: {{ number_format($pastry->price, 2) }}</strong></p>
                                        <form action="{{ route('cart.add', $pastry->id) }}" method="POST">
                                            @csrf
                                            <input type="number" name="quantity" value="1" min="1" class="form-control mb-2">
                                            <button type="submit" class="btn btn-primary w-100">
                                                <i class="bi bi-cart-fill"></i> Tambah ke Keranjang
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <style>
        .card {
            transition: transform 0.2s ease;
            height: 100%; /* Pastikan semua kartu memiliki tinggi yang sama */
        }
        .card:hover {
            transform: scale(1.05);
        }
        img.card-img-top {
            height: 200px; /* Mengatur tinggi gambar */
            object-fit: cover; /* Memastikan gambar tidak terdistorsi */
        }
    </style>
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</x-app-layout>
