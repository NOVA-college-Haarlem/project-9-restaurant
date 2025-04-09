<x-app-layout>
    <!DOCTYPE html>
    <html lang="nl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            
        </style>
    </head>

    <body>
        <!-- Hero Section -->
        <div class="bg-restaurant-hero bg-cover py-20 px-4">
            <div class="max-w-7xl mx-auto text-center">
                <h1 class="text-4xl font-bold text-white mb-6">Welkom bij [Restaurantnaam]</h1>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('reservations.create') }}" class="btn-primary">Reserveren</a>
                    <a href="{{ route('menu.index') }}" class="btn-secondary">Bekijk Menu</a>
                </div>
            </div>
        </div>

        <!-- Kernfunctionaliteiten Grid -->
        <div class="max-w-7xl mx-auto py-12 px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @include('home.partials.grid-item-reservation')
                @include('home.partials.grid-item-menu')
                @include('home.partials.grid-item-events')
                @include('home.partials.grid-item-loyalty')
                @include('home.partials.grid-item-feedback')
            </div>
        </div>

        <!-- Reservation Modal -->
        @include('home.modals.reservation')
    </body>

    </html>
</x-app-layout>