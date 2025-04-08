<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Los Pollos Hermanos') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])


    <!-- Custom CSS -->
    <style>
        /* Hero Section */
        .hero-section {
            position: relative;
            background: url('/images/restaurant-hero.jpg') center center no-repeat;
            background-size: cover;
            min-height: 70vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            animation: fadeIn 1.5s ease-out;
            overflow: hidden;
        }

        .hero-section::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 150px;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), #FEF3C7);
            z-index: 5;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        .hero-overlay {
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.6), rgba(217, 119, 6, 0.6));
        }

        .hero-title {
            font-size: 3rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 1rem;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        /* Button Styles */
        .btn-reserve {
            background-color: #D97706;
            padding: 1rem 2rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(217, 119, 6, 0.3);
            transform: translateY(0);
        }

        .btn-reserve:hover {
            background-color: #F59E0B;
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(217, 119, 6, 0.4);
        }

        /* Features Section */
        .features-section {
            padding: 5rem 0;
            background-color: #FEF3C7;
        }

        .feature-card {
            background: white;
            border-radius: 1.5rem;
            padding: 3rem;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .feature-card svg {
            width: 3rem;
            height: 3rem;
            margin-bottom: 1.5rem;
            color: #D97706;
        }

        .feature-card h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: #3B3B3B;
        }

        .feature-card p {
            font-size: 1rem;
            color: #4B5563;
            margin-bottom: 1.5rem;
        }

        .feature-card a {
            color: #D97706;
            font-weight: 600;
            transition: color 0.3s;
        }

        .feature-card a:hover {
            color: #F59E0B;
        }

        .section-divider {
            width: 80px;
            height: 3px;
            background: #D97706;
            margin: 2rem auto;
        }

        /* Testimonial Carousel */
        .testimonial-carousel {
            margin-top: 5rem;
            padding: 2rem;
            background-color: #FFF7ED;
            border-radius: 1rem;
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .gradient-transition {
            height: 100px;
            background: linear-gradient(to bottom, #FEF3C7, #FFF7ED);
        }

        .testimonial-carousel h2 {
            font-size: 2rem;
            font-weight: 700;
            color: #3B3B3B;
            margin-bottom: 2rem;
        }

        .testimonial-carousel p {
            font-size: 1rem;
            color: #4B5563;
            margin-bottom: 1rem;
            font-style: italic;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .feature-card {
                padding: 2rem;
            }
        }

        /* Navbar animaties */
        [x-cloak] {
            display: none !important;
        }

        /* Amber kleuren consistent maken */
        .bg-amber-50 {
            background-color: #fffbeb;
        }

        .text-amber-600 {
            color: #d97706;
        }

        .hover\:text-amber-600:hover {
            color: #d97706;
        }

        .bg-amber-600 {
            background-color: #d97706;
        }

        .hover\:bg-amber-700:hover {
            background-color: #b45309;
        }

        .nav-link {
            @apply text-gray-800 px-3 py-2 text-lg font-medium transition-colors hover:text-amber-600;
        }

        .active-nav {
            @apply text-amber-700 border-b-2 border-amber-600;
        }

        .dropdown-link {
            @apply block px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600;
        }

        .mobile-menu-button {
            @apply inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-amber-600 hover:bg-amber-50 focus:outline-none transition duration-300;
        }

        /* Helper functie voor active states */
        @php function active_nav($route) {
            return request()->routeIs($route) ? 'active-nav': '';
        }

        @endphp

        /* Dropdown en algemene navigatie stijlverbeteringen */
        .nav-link {
            @apply text-gray-800 px-4 py-2 text-lg font-medium transition-colors hover:text-amber-600 hover:bg-amber-50 rounded-md;
        }

        .active-nav {
            @apply text-amber-700 border-b-2 border-amber-600;
        }

        .dropdown-link {
            @apply block px-4 py-2 text-gray-700 hover:bg-amber-50 hover:text-amber-600 rounded-md;
        }

        .mobile-menu-button {
            @apply inline-flex items-center justify-center p-2 rounded-md text-gray-800 hover:text-amber-600 hover:bg-amber-50 focus:outline-none transition duration-300;
        }

        /* Toevoeging van schaduwen en randronding */
        .shadow-lg {
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }

        .bg-white {
            background-color: #ffffff;
        }

        .bg-amber-50 {
            background-color: #fffbeb;
        }

        .text-amber-600 {
            color: #d97706;
        }

        .hover\:text-amber-600:hover {
            color: #d97706;
        }

        .bg-amber-600 {
            background-color: #d97706;
        }

        /* Nieuwere styling voor links layout */
        .links-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Vergroot de ruimte tussen de blokken */
            justify-content: space-between;
            padding: 2rem;
        }

        .link-card {
            background: white;
            border-radius: 1rem;
            padding: 2rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex-basis: 22%;
            /* Zorgt voor 4 items naast elkaar */
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .link-card:hover {
            background-color: #FEF3C7;
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(217, 119, 6, 0.3);
        }

        .link-card h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
            color: #3B3B3B;
        }

        .link-card a {
            font-size: 1rem;
            color: #D97706;
            transition: color 0.3s;
        }

        .link-card a:hover {
            color: #F59E0B;
        }

        /* Verbeterde responsive layout */
        @media (max-width: 1024px) {
            .link-card {
                flex-basis: 45%;
                /* Twee items naast elkaar op medium schermen */
            }
        }

        @media (max-width: 768px) {
            .link-card {
                flex-basis: 100%;
                /* Eén item per rij op kleinere schermen */
            }
        }

        footer {
            background: linear-gradient(to bottom, #ffffff, #fff7ed);
        }

        footer a:hover {
            transform: translateY(-2px);
            transition: all 0.3s ease;
        }

        footer svg {
            transition: transform 0.3s ease;
        }

        footer svg:hover {
            transform: scale(1.15);
        }
    </style>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('nav', () => ({
                isOpen: false
            }))
        })
    </script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-[#FFF7ED]">
        <x-nav /> <!-- Toegevoegde navigatie -->

        <!-- Page Content -->
        <main class="relative">
            {{ $slot }}
        </main>
        <x-footer />
    </div>
</body>

</html>