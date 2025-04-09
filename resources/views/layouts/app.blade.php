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

        .gradient-transition {
            height: 100px;
            background: linear-gradient(to bottom, #FEF3C7, #FFF7ED);
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

        /* Nieuwere styling voor links layout */
        .links-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
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
            }
        }

        @media (max-width: 768px) {
            .link-card {
                flex-basis: 100%;
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

        /* Menu items styling */
        .menu-item-card {
            transition: transform 0.3s ease-in-out;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .menu-item-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .special-offer {
            border: 3px solid #ffc107;
            position: relative;
            overflow: hidden;
        }

        .special-badge {
            position: absolute;
            top: 10px;
            right: -30px;
            transform: rotate(45deg);
            width: 120px;
            text-align: center;
            background: #ffc107;
            color: #000;
            font-weight: bold;
            font-size: 16px;
        }

        .layout-selector .btn {
            min-width: 120px;
            font-size: 14px;
        }

        .filter-group {
            margin-bottom: 1rem;
        }

        .filter-group select,
        .filter-group input {
            margin-right: 10px;
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            border: 1px solid #ced4da;
            transition: border 0.3s ease;
        }

        .filter-group select:focus,
        .filter-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 1rem;
            color: #6c757d;
        }

        .card-price {
            font-size: 1.75rem;
            font-weight: bold;
            color: #007bff;
        }

        .badge {
            font-size: 0.85rem;
        }

        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .d-flex {
            display: flex;
            gap: 8px;
        }

        .d-flex .badge {
            margin-right: 8px;
        }

        .btn-outline-primary {
            width: 100%;
            margin-top: 10px;
            font-weight: bold;
        }

        /* Menu items layout - responsive */
        .row-cols-1 .menu-item {
            margin-bottom: 20px;
        }

        @media (min-width: 576px) {
            .row-cols-1 {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
        }

        @media (min-width: 768px) {
            .row-cols-md-2 {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (min-width: 992px) {
            .row-cols-lg-3 {
                grid-template-columns: repeat(4, 1fr);
            }
        }

        /* Table styling */
        .table {
            border-collapse: separate;
            border-spacing: 0;
            width: 100%;
            background-color: #ffffff;
        }

        .table th,
        .table td {
            padding: 12px 15px;
            vertical-align: middle;
        }

        .table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
        }

        .status-indicator {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: inline-block;
        }

        .active-status {
            background-color: #28a745;
        }

        .inactive-status {
            background-color: #dc3545;
        }

        .table-image {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .action-buttons {
            display: flex;
            gap: 8px;
        }

        .action-buttons .btn {
            padding: 8px 12px;
            font-size: 0.875rem;
            border-radius: 4px;
        }

        .btn-outline-warning {
            border-color: #ffc107;
            color: #ffc107;
        }

        .btn-outline-warning:hover {
            background-color: #ffc107;
            color: #fff;
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
        }

        .btn-primary {
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .text-center.py-4 {
            font-size: 1.2rem;
            color: #6c757d;
        }

        .text-center.py-4 a {
            color: #007bff;
            text-decoration: none;
        }

        .text-center.py-4 a:hover {
            text-decoration: underline;
        }

        .filter-group {
            margin-bottom: 1.5rem;
        }

        .filter-group .form-select,
        .filter-group .form-control {
            padding: 12px 15px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ced4da;
            background-color: #fff;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .filter-group .form-select:focus,
        .filter-group .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        .filter-group select {
            height: 50px;
        }

        .filter-group input {
            height: 50px;
        }

        /* Adding spacing between the input/select elements */
        .filter-group .col-md-4 {
            margin-bottom: 10px;
        }

        /* Responsive layout */
        @media (max-width: 767px) {
            .filter-group .col-md-4 {
                flex: 1 1 100%;
                /* Ensures that elements stack on smaller screens */
            }
        }

        /* Digital Menu Management Styles */
        .table-image {
            max-width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .action-buttons {
            min-width: 200px;
            display: flex;
            gap: 8px;
        }

        .status-indicator {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 8px;
        }

        .active-status {
            background-color: #28a745;
        }

        .inactive-status {
            background-color: #dc3545;
        }

        .menu-management-container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .menu-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .menu-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .menu-table th {
            background-color: #D97706;
            color: white;
            padding: 1rem;
            text-align: left;
        }

        .menu-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .menu-table tr:last-child td {
            border-bottom: none;
        }

        .menu-table tr:hover {
            background-color: #FFF7ED;
        }

        .badge-secondary {
            background-color: #6c757d;
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
            font-size: 0.875rem;
        }

        .btn {
            padding: 0.375rem 0.75rem;
            border-radius: 0.25rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: #D97706;
            border-color: #D97706;
            color: white;
        }

        .btn-primary:hover {
            background-color: #B45309;
            border-color: #B45309;
        }

        .btn-outline-warning {
            border-color: #D97706;
            color: #D97706;
        }

        .btn-outline-warning:hover {
            background-color: #D97706;
            color: white;
        }

        .btn-outline-danger {
            border-color: #dc3545;
            color: #dc3545;
        }

        .btn-outline-danger:hover {
            background-color: #dc3545;
            color: white;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            padding: 1rem;
            border-radius: 0.25rem;
            margin-bottom: 1rem;
        }

        .text-muted {
            color: #6c757d;
        }

        .text-center {
            text-align: center;
        }

        .py-4 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        @media (max-width: 768px) {
            .action-buttons {
                flex-direction: column;
                gap: 4px;
                min-width: auto;
            }

            .menu-table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Digital Menu Board Styles */
        .menu-board-container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .menu-board-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .filter-group {
            margin-bottom: 1.5rem;
        }

        .filter-group select,
        .filter-group input {
            padding: 12px 15px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ced4da;
            background-color: #fff;
            transition: border-color 0.3s ease;
            width: 100%;
        }

        .filter-group select:focus,
        .filter-group input:focus {
            border-color: #D97706;
            box-shadow: 0 0 5px rgba(217, 119, 6, 0.3);
            outline: none;
        }

        .menu-item-card {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
            overflow: hidden;
            height: 100%;
            background: white;
        }

        .menu-item-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(217, 119, 6, 0.3);
        }

        .special-offer {
            border: 3px solid #F59E0B;
            position: relative;
            overflow: hidden;
        }

        .special-badge {
            position: absolute;
            top: 15px;
            right: -35px;
            transform: rotate(45deg);
            width: 140px;
            text-align: center;
            background: #F59E0B;
            color: #000;
            font-weight: bold;
            font-size: 14px;
            padding: 5px 0;
        }

        .menu-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            color: #3B3B3B;
        }

        .card-price {
            font-size: 1.5rem;
            font-weight: bold;
            color: #D97706;
            margin: 0.5rem 0;
        }

        .dietary-badges {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin: 1rem 0;
        }

        .badge {
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .badge.bg-success {
            background-color: #28a745;
        }

        .badge.bg-danger {
            background-color: #dc3545;
        }

        .btn-outline-primary {
            border-color: #D97706;
            color: #D97706;
            padding: 0.75rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .btn-outline-primary:hover {
            background-color: #D97706;
            color: white;
        }

        .alert-warning {
            background-color: #FFF3CD;
            color: #856404;
            padding: 1rem;
            border-radius: 0.5rem;
            border: 1px solid #FFEEBA;
        }

        /* Responsive grid layout */
        .menu-items-grid {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            gap: 1.5rem;
        }

        @media (min-width: 768px) {
            .menu-items-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 992px) {
            .menu-items-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Animation for menu items */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .menu-item {
            animation: fadeIn 0.5s ease-out forwards;
            opacity: 0;
        }

        .menu-item:nth-child(1) {
            animation-delay: 0.1s;
        }

        .menu-item:nth-child(2) {
            animation-delay: 0.2s;
        }

        .menu-item:nth-child(3) {
            animation-delay: 0.3s;
        }

        .menu-item:nth-child(4) {
            animation-delay: 0.4s;
        }

        .menu-item:nth-child(5) {
            animation-delay: 0.5s;
        }

        .menu-item:nth-child(6) {
            animation-delay: 0.6s;
        }

        /* Add more as needed */
        /* Menu Item Form Styles */
        .menu-form-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .menu-form-title {
            color: #3B3B3B;
            margin-bottom: 2rem;
            font-size: 2rem;
            font-weight: 600;
        }

        .menu-form {
            background-color: #FFF7ED;
            padding: 2rem;
            border-radius: 0.75rem;
        }

        .menu-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #3B3B3B;
        }

        .menu-form .form-control,
        .menu-form .form-select {
            padding: 0.75rem 1rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.5rem;
            width: 100%;
            transition: border-color 0.3s, box-shadow 0.3s;
            background-color: white;
        }

        .menu-form .form-control:focus,
        .menu-form .form-select:focus {
            border-color: #D97706;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.2);
            outline: none;
        }

        .menu-form textarea.form-control {
            min-height: 120px;
        }

        .menu-form .form-check {
            margin-bottom: 0.5rem;
        }

        .menu-form .form-check-input {
            width: 1.25em;
            height: 1.25em;
            margin-top: 0.15em;
            margin-right: 0.5rem;
            border: 1px solid #D1D5DB;
        }

        .menu-form .form-check-input:checked {
            background-color: #D97706;
            border-color: #D97706;
        }

        .menu-form .form-check-label {
            font-weight: 400;
            color: #4B5563;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn-primary {
            background-color: #D97706;
            border-color: #D97706;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #B45309;
            border-color: #B45309;
            transform: translateY(-2px);
        }

        .btn-secondary {
            background-color: #6B7280;
            border-color: #6B7280;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .btn-secondary:hover {
            background-color: #4B5563;
            border-color: #4B5563;
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .menu-form-container {
                padding: 1.5rem;
            }

            .menu-form {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
                gap: 0.75rem;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
            }
        }

        /* Menu Item Form Styles */
        .menu-form-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .menu-form-title {
            color: #3B3B3B;
            margin-bottom: 1.5rem;
            font-size: 1.8rem;
            font-weight: 600;
            border-bottom: 2px solid #F59E0B;
            padding-bottom: 0.5rem;
        }

        .menu-form {
            background-color: #FFF7ED;
            padding: 2rem;
            border-radius: 0.75rem;
        }

        .menu-form label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #3B3B3B;
        }

        .menu-form .form-control,
        .menu-form .form-select {
            padding: 0.75rem 1rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.5rem;
            width: 100%;
            transition: all 0.3s;
            background-color: white;
            font-size: 1rem;
        }

        .menu-form .form-control:focus,
        .menu-form .form-select:focus {
            border-color: #D97706;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.2);
            outline: none;
        }

        .menu-form textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .menu-form .form-check {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .menu-form .form-check-input {
            width: 1.25em;
            height: 1.25em;
            margin-right: 0.5rem;
            border: 1px solid #D1D5DB;
            transition: all 0.2s;
        }

        .menu-form .form-check-input:checked {
            background-color: #D97706;
            border-color: #D97706;
        }

        .menu-form .form-check-label {
            font-weight: 400;
            color: #4B5563;
        }

        .form-group-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: #D97706;
            margin: 1.5rem 0 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid #FEF3C7;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: flex-end;
        }

        .btn-primary {
            background-color: #D97706;
            border-color: #D97706;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s;
            color: white;
        }

        .btn-primary:hover {
            background-color: #B45309;
            border-color: #B45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: #6B7280;
            border-color: #6B7280;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-radius: 0.5rem;
            transition: all 0.3s;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #4B5563;
            border-color: #4B5563;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .menu-form-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .menu-form {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column;
                gap: 0.75rem;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
            }

            .menu-form-title {
                font-size: 1.5rem;
            }
        }

        /* File input custom styling */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0.75rem 1rem;
            background-color: #FEF3C7;
            border: 1px dashed #D97706;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s;
            text-align: center;
            min-height: 42px;
        }

        .file-input-label:hover {
            background-color: #F59E0B;
            color: white;
        }

        .file-input-text {
            margin-left: 0.5rem;
        }

        /* Form Container */
        .form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Form Elements */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
            font-size: 1rem;
        }

        .form-control:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.2);
        }

        /* Checkboxes */
        .form-check {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .form-check-input {
            margin-right: 0.5rem;
        }

        /* Buttons */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.25rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-primary {
            background-color: #D97706;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background-color: #B45309;
        }

        .btn-secondary {
            background-color: #6B7280;
            color: white;
            border: none;
        }

        .btn-secondary:hover {
            background-color: #4B5563;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .form-container {
                padding: 1rem;
                margin: 1rem;
            }
        }

        /* Form Container */
        .edit-form-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Form Title */
        .edit-form-title {
            font-size: 1.8rem;
            color: #3B3B3B;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #D97706;
        }

        /* Form Groups */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #3B3B3B;
        }

        /* Input Fields */
        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Select Dropdown */
        .form-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: all 0.2s;
            background-color: white;
        }

        /* Checkboxes */
        .form-check {
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
        }

        .form-check-input {
            width: 1.25em;
            height: 1.25em;
            margin-right: 0.5rem;
            border: 1px solid #D1D5DB;
            border-radius: 0.25rem;
            transition: all 0.2s;
        }

        .form-check-input:checked {
            background-color: #D97706;
            border-color: #D97706;
        }

        /* File Input */
        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type="file"] {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
        }

        .file-input-label {
            display: block;
            padding: 0.75rem;
            background-color: #FFF7ED;
            border: 1px dashed #D97706;
            border-radius: 0.375rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .file-input-label:hover {
            background-color: #FEF3C7;
        }

        /* Current Image */
        .current-image {
            max-width: 200px;
            height: auto;
            margin-top: 1rem;
            border-radius: 0.375rem;
            border: 1px solid #E5E7EB;
        }

        /* Buttons */
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            border: none;
            text-align: center;
        }

        .btn-primary {
            background-color: #D97706;
            color: white;
        }

        .btn-primary:hover {
            background-color: #B45309;
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: #6B7280;
            color: white;
        }

        .btn-secondary:hover {
            background-color: #4B5563;
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .edit-form-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }

        /* Main Container */
        .orders-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Page Title */
        .page-title {
            font-size: 2rem;
            color: #3B3B3B;
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #D97706;
        }

        /* Alert Styling */
        .alert-success {
            background-color: #D1FAE5;
            color: #065F46;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid #10B981;
        }

        /* Table Styling */
        .orders-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .orders-table thead {
            background-color: #3B3B3B;
            color: white;
        }

        .orders-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .orders-table td {
            padding: 1rem;
            border-bottom: 1px solid #F3F4F6;
            vertical-align: middle;
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .orders-table tr:hover {
            background-color: #FFF7ED;
        }

        /* Status Badges */
        .status-badge {
            padding: 0.5rem 0.75rem;
            border-radius: 0.5rem;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-block;
        }

        .status-pending {
            background-color: #FEF3C7;
            color: #B45309;
        }

        .status-completed {
            background-color: #D1FAE5;
            color: #065F46;
        }

        .status-rejected {
            background-color: #FEE2E2;
            color: #991B1B;
        }

        /* Action Form */
        .status-form {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        .status-select {
            padding: 0.5rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            background-color: white;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .status-select:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
        }

        .update-btn {
            padding: 0.5rem 1rem;
            background-color: #D97706;
            color: white;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 0.9rem;
        }

        .update-btn:hover {
            background-color: #B45309;
            transform: translateY(-1px);
        }

        /* Price Styling */
        .price {
            font-weight: 600;
            color: #3B3B3B;
        }

        /* Delivery Type */
        .delivery-type {
            text-transform: capitalize;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .orders-table {
                display: block;
                overflow-x: auto;
            }

            .status-form {
                flex-direction: column;
                align-items: flex-start;
            }

            .update-btn {
                width: 100%;
            }
        }

        /* Main Container */
        .order-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Page Title */
        .order-title {
            font-size: 2rem;
            color: #3B3B3B;
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #D97706;
        }

        /* Alert Styling */
        .alert {
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
        }

        .alert-danger {
            background-color: #FEE2E2;
            color: #991B1B;
            border-left: 4px solid #DC2626;
        }

        .alert-success {
            background-color: #D1FAE5;
            color: #065F46;
            border-left: 4px solid #10B981;
        }

        /* Card Styling */
        .order-card {
            background-color: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Menu Items Styling */
        .menu-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: #FFF7ED;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .menu-item:hover {
            background-color: #FEF3C7;
            transform: translateY(-2px);
        }

        .menu-item label {
            font-weight: 500;
            color: #3B3B3B;
            flex-grow: 1;
            margin-right: 1rem;
        }

        .menu-item input[type="number"] {
            width: 80px;
            padding: 0.5rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            text-align: center;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .menu-item input[type="number"]:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
        }

        /* Delivery Select */
        .delivery-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            font-size: 1rem;
            margin-bottom: 2rem;
            transition: all 0.2s;
        }

        .delivery-select:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #10B981;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background-color: #059669;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Price Styling */
        .price {
            color: #D97706;
            font-weight: 600;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .menu-item {
                flex-direction: column;
                align-items: flex-start;
            }

            .menu-item input[type="number"] {
                width: 100%;
                margin-top: 0.5rem;
            }
        }

        /* Main Container */
        .menu-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Page Title */
        .menu-title {
            font-size: 2.5rem;
            color: #3B3B3B;
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #D97706;
        }

        /* Form Styling */
        .order-form {
            background-color: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Menu Items Styling */
        .menu-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            margin-bottom: 1rem;
            background-color: #FFF7ED;
            border-radius: 0.5rem;
            transition: all 0.2s;
        }

        .menu-item:hover {
            background-color: #FEF3C7;
            transform: translateY(-2px);
        }

        .menu-item-checkbox {
            margin-right: 1rem;
            width: 1.25rem;
            height: 1.25rem;
            accent-color: #D97706;
        }

        .menu-item-details {
            flex-grow: 1;
            font-size: 1.1rem;
            color: #3B3B3B;
        }

        .menu-item-name {
            font-weight: 600;
            margin-right: 0.5rem;
        }

        .menu-item-price {
            color: #D97706;
            font-weight: 600;
        }

        .menu-item-quantity {
            width: 70px;
            padding: 0.5rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            text-align: center;
            font-size: 1rem;
            margin-left: 1rem;
            transition: all 0.2s;
        }

        .menu-item-quantity:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
        }

        /* Delivery Select */
        .delivery-section {
            margin: 2rem 0;
            padding: 1rem;
            background-color: #F3F4F6;
            border-radius: 0.5rem;
        }

        .delivery-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #3B3B3B;
            font-size: 1.1rem;
        }

        .delivery-select {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .delivery-select:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #D97706;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background-color: #B45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .menu-item {
                flex-wrap: wrap;
            }

            .menu-item-quantity {
                margin-left: 0;
                margin-top: 0.5rem;
                width: 100%;
            }
        }

        /* Main Container */
        .reservation-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Page Title */
        .reservation-title {
            font-size: 2.2rem;
            color: #3B3B3B;
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #D97706;
        }

        /* Alert Styling */
        .alert-success {
            background-color: #D1FAE5;
            color: #065F46;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 2rem;
            border-left: 4px solid #10B981;
        }

        /* Form Styling */
        .reservation-form {
            background-color: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #3B3B3B;
            font-size: 1.1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #E5E7EB;
            border-radius: 0.5rem;
            font-size: 1rem;
            transition: all 0.2s;
        }

        .form-control:focus {
            border-color: #D97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.1);
        }

        textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #D97706;
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .submit-btn:hover {
            background-color: #B45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .reservation-container {
                padding: 0 0.5rem;
            }

            .reservation-form {
                padding: 1.5rem;
            }

            .reservation-title {
                font-size: 1.8rem;
            }
        }

        /* Main Container */
        .table-management-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Page Title */
        .page-title {
            font-size: 2.5rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            font-weight: 600;
            position: relative;
            display: inline-block;
        }

        .page-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: #d97706;
            border-radius: 2px;
        }

        /* Add Button */
        .add-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 500;
            text-decoration: none;
            margin-bottom: 2rem;
            transition: all 0.3s ease;
        }

        .add-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Alert Styling */
        .alert-success {
            background-color: #f0fdf4;
            color: #166534;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            border-left: 4px solid #22c55e;
        }

        /* Table Styling */
        .tables-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .tables-table thead {
            background-color: #2d3748;
            color: white;
        }

        .tables-table th {
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .tables-table td {
            padding: 1rem;
            border-bottom: 1px solid #edf2f7;
            vertical-align: middle;
        }

        .tables-table tr:last-child td {
            border-bottom: none;
        }

        .tables-table tr:hover {
            background-color: #fff7ed;
        }

        /* Status Badges */
        .status-badge {
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-block;
        }

        .status-available {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-reserved {
            background-color: #fef9c3;
            color: #854d0e;
        }

        .status-occupied {
            background-color: #fee2e2;
            color: #991b1b;
        }

        /* Action Buttons */
        .action-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            font-size: 0.875rem;
        }

        .edit-btn {
            background-color: #fef08a;
            color: #854d0e;
        }

        .edit-btn:hover {
            background-color: #fde047;
            transform: translateY(-1px);
        }

        .delete-btn {
            background-color: #fecaca;
            color: #991b1b;
            margin-left: 0.5rem;
        }

        .delete-btn:hover {
            background-color: #fca5a5;
            transform: translateY(-1px);
        }

        /* Action Form */
        .action-form {
            display: inline;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .tables-table {
                display: block;
                overflow-x: auto;
            }

            .action-buttons {
                display: flex;
                flex-direction: column;
                gap: 0.5rem;
            }

            .delete-btn {
                margin-left: 0;
            }
        }

        /* Main Container */
        .table-form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .form-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Select Dropdown Styling */
        .form-control-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .table-form-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .form-title {
                font-size: 1.75rem;
            }
        }

        /* Main Container */
        .edit-table-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .edit-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Select Dropdown Styling */
        .form-control-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Status Options Colors */
        .status-option-available {
            color: #166534;
        }

        .status-option-occupied {
            color: #991b1b;
        }

        .status-option-reserved {
            color: #854d0e;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .edit-table-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .edit-title {
                font-size: 1.75rem;
            }
        }

        /* Main Container */
        .waitlist-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Titles */
        .waitlist-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        .section-title {
            font-size: 1.5rem;
            color: #2d3748;
            margin: 1.5rem 0 1rem 0;
        }

        /* Alert Styling */
        .alert-success {
            padding: 1rem;
            background-color: #d4edda;
            color: #155724;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid #c3e6cb;
        }

        /* Form Styling */
        .waitlist-form {
            margin-bottom: 2rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Select Dropdown Styling */
        .form-control-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        /* Button Styling */
        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 1rem;
        }

        .btn-primary {
            background-color: #d97706;
            color: white;
        }

        .btn-primary:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-danger:hover {
            background-color: #bb2d3b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 53, 69, 0.2);
        }

        /* Table Styling */
        .waitlist-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .waitlist-table th {
            background-color: #D97706;
            color: white;
            padding: 1rem;
            text-align: left;
        }

        .waitlist-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .waitlist-table tr:last-child td {
            border-bottom: none;
        }

        .waitlist-table tr:hover {
            background-color: #FFF7ED;
        }

        /* Divider */
        .divider {
            border: 0;
            height: 1px;
            background-color: #e2e8f0;
            margin: 2rem 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .waitlist-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .waitlist-title {
                font-size: 1.75rem;
            }

            .waitlist-table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Main Container */
        .menu-board-container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .menu-title {
            font-size: 2.5rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Filter Controls */
        .filter-group {
            margin-bottom: 2rem;
            padding: 1rem;
            background-color: #f8fafc;
            border-radius: 8px;
        }

        .form-select,
        .form-control {
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #fff;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
        }

        /* Menu Items Grid */
        .menu-items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        /* Menu Card */
        .menu-item-card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .menu-item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
        }

        .menu-item-card.special-offer {
            border: 2px solid #d97706;
        }

        .special-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #d97706;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.8rem;
            z-index: 1;
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }

        .card-body {
            padding: 1.5rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .card-title {
            font-size: 1.4rem;
            color: #2d3748;
            margin-bottom: 0.75rem;
        }

        .card-text {
            color: #4a5568;
            margin-bottom: 1rem;
        }

        .menu-price {
            font-size: 1.5rem;
            color: #d97706;
            font-weight: 600;
            margin: 0.5rem 0;
        }

        /* Badges */
        .badge {
            padding: 0.35rem 0.65rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.75rem;
        }

        .bg-success {
            background-color: #38a169 !important;
        }

        .bg-danger {
            background-color: #e53e3e !important;
        }

        /* Button */
        .btn-outline-primary {
            color: #d97706;
            border-color: #d97706;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            margin-top: auto;
        }

        .btn-outline-primary:hover {
            background-color: #d97706;
            color: white;
        }

        /* Alert */
        .alert-warning {
            background-color: #fefcbf;
            color: #975a16;
            border: 1px solid #f6e05e;
            border-radius: 8px;
            padding: 1rem;
        }

        /* Header Layout */
        .header-layout {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .menu-board-container {
                padding: 1rem;
            }

            .menu-title {
                font-size: 2rem;
            }

            .filter-group {
                flex-direction: column;
                gap: 1rem;
            }

            .menu-items-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Main Container */
        .feedback-list-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .feedback-list-title {
            font-size: 2.2rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Filter Buttons */
        .filter-buttons {
            display: flex;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .filter-btn {
            padding: 0.6rem 1.2rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            font-size: 0.95rem;
            border: 2px solid;
            background-color: transparent;
        }

        .filter-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .btn-all {
            border-color: #6b7280;
            color: #6b7280;
        }

        .btn-all:hover {
            background-color: #f3f4f6;
            color: #1f2937;
        }

        .btn-high {
            border-color: #38a169;
            color: #38a169;
        }

        .btn-high:hover {
            background-color: #f0fff4;
            color: #2f855a;
        }

        .btn-low {
            border-color: #dd6b20;
            color: #dd6b20;
        }

        .btn-low:hover {
            background-color: #fffaf0;
            color: #c05621;
        }

        /* Feedback List */
        .feedback-list {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 1.5rem;
        }

        .feedback-item {
            padding: 1.25rem 1.5rem;
            border: none;
            border-bottom: 1px solid #e5e7eb;
            transition: all 0.2s ease;
            text-decoration: none;
            display: block;
            color: inherit;
        }

        .feedback-item:hover {
            background-color: #fff7ed;
            transform: translateX(5px);
        }

        .feedback-item:last-child {
            border-bottom: none;
        }

        .feedback-rating {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            color: #2d3748;
        }

        .rating-high {
            color: #38a169;
        }

        .rating-medium {
            color: #d97706;
        }

        .rating-low {
            color: #e53e3e;
        }

        .feedback-time {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .feedback-comment {
            margin: 0.5rem 0;
            color: #4a5568;
            line-height: 1.5;
        }

        .feedback-author {
            font-size: 0.9rem;
            color: #6b7280;
            font-style: italic;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .pagination {
            display: flex;
            gap: 0.5rem;
        }

        .page-item {
            list-style: none;
        }

        .page-link {
            padding: 0.5rem 0.9rem;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
            color: #4a5568;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .page-link:hover {
            background-color: #f3f4f6;
            color: #1f2937;
        }

        .page-item.active .page-link {
            background-color: #d97706;
            border-color: #d97706;
            color: white;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .feedback-list-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .feedback-list-title {
                font-size: 1.8rem;
            }

            .filter-buttons {
                gap: 0.5rem;
            }

            .filter-btn {
                padding: 0.5rem 1rem;
                font-size: 0.85rem;
            }
        }

        /* Main Container */
        .feedback-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2.5rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .feedback-title {
            font-size: 2.2rem;
            color: #2d3748;
            margin-bottom: 1.8rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Form Styling */
        .feedback-form {
            margin-top: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
            margin-bottom: 1.2rem;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        /* Rating Input */
        .rating-input {
            width: 80px !important;
            text-align: center;
            font-weight: bold;
        }

        /* File Upload */
        .form-control[type="file"] {
            padding: 0.5rem;
        }

        /* Checkbox Styling */
        .form-check {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .form-check-input {
            width: 1.2em;
            height: 1.2em;
            margin-right: 0.6rem;
            border: 1px solid #e2e8f0;
            border-radius: 4px;
            transition: all 0.2s ease;
        }

        .form-check-input:checked {
            background-color: #d97706;
            border-color: #d97706;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
        }

        .form-check-label {
            color: #4a5568;
            font-size: 0.95rem;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Error Styling */
        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #fca5a5;
            margin-bottom: 1.5rem;
        }

        .alert-danger ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        .alert-danger li {
            margin-bottom: 0.3rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .feedback-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .feedback-title {
                font-size: 1.8rem;
            }
        }

        /* Main Container */
        .feedback-detail-container {
            max-width: 800px;
            margin: 2rem auto;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        /* Card Header */
        .feedback-header {
            background-color: #D97706;
            color: white;
            padding: 1.25rem 1.5rem;
            font-size: 1.1rem;
            font-weight: 500;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Card Body */
        .feedback-body {
            padding: 1.5rem 2rem;
        }

        /* Rating Display */
        .feedback-rating {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #2d3748;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .rating-value {
            display: inline-block;
            padding: 0.35rem 0.8rem;
            border-radius: 20px;
            background-color: #FFF7ED;
            color: #D97706;
            font-weight: 700;
        }

        /* Feedback Sections */
        .feedback-section {
            margin-bottom: 1.8rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .feedback-section:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .feedback-section h6 {
            font-size: 1rem;
            color: #D97706;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .feedback-section p {
            color: #4a5568;
            line-height: 1.6;
            margin: 0;
            white-space: pre-line;
        }

        /* Photo Thumbnail */
        .feedback-photo {
            max-height: 300px;
            width: auto;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        /* Admin Response */
        .admin-response {
            background-color: #f0f9ff;
            border-left: 4px solid #0ea5e9;
            padding: 1.25rem;
            border-radius: 0 8px 8px 0;
            margin: 2rem 0;
        }

        .admin-response h5 {
            color: #0369a1;
            font-size: 1.1rem;
            margin-bottom: 0.75rem;
            font-weight: 600;
        }

        .admin-response p {
            color: #4a5568;
            line-height: 1.6;
        }

        /* Response Form */
        .response-form {
            margin-top: 2rem;
            padding: 1.5rem;
            background-color: #f8fafc;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
        }

        .form-label {
            display: block;
            margin-bottom: 0.6rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #fff;
            margin-bottom: 1.2rem;
        }

        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
        }

        /* Submit Button */
        .submit-btn {
            padding: 0.75rem 1.5rem;
            background-color: #D97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #B45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .feedback-detail-container {
                margin: 1rem;
                border-radius: 8px;
            }

            .feedback-body {
                padding: 1.25rem;
            }

            .feedback-header {
                font-size: 1rem;
                padding: 1rem;
            }

            .feedback-photo {
                max-height: 250px;
            }
        }

        /* Hero Section Styling */
        .bg-restaurant-hero {
            background:
                linear-gradient(rgba(0, 0, 0, 0.71), rgba(0, 0, 0, 0.71)),
                url('/images/restaurant-hero.jpg') center/cover no-repeat;
            min-height: 60vh;
            display: flex;
            align-items: center;
        }

        /* Button Styling */
        .btn-primary {
            display: inline-block;
            padding: 12px 32px;
            background-color: #D97706;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid #D97706;
        }

        .btn-primary:hover {
            background-color: #B45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.3);
        }

        .btn-secondary {
            display: inline-block;
            padding: 12px 32px;
            background-color: transparent;
            color: white;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid white;
        }

        .btn-secondary:hover {
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        /* Grid Styling */
        .grid {
            display: grid;
            gap: 32px;
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, 1fr);
        }

        @media (min-width: 768px) {
            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (min-width: 1024px) {
            .lg\:grid-cols-3 {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        /* Grid Item Styling (voor partials) */
        .grid-item {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .grid-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .bg-restaurant-hero {
                min-height: 50vh;
                padding: 40px 16px;
            }

            .text-4xl {
                font-size: 2rem;
                line-height: 2.5rem;
            }

            .btn-primary,
            .btn-secondary {
                padding: 10px 24px;
                font-size: 0.9rem;
            }
        }

        /* Main Container */
        .loyalty-container {
            max-width: 600px;
            margin: 3rem auto;
            padding: 2.5rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .loyalty-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Alert Styling */
        .alert-danger {
            background-color: #fee2e2;
            color: #b91c1c;
            padding: 1rem;
            border-radius: 8px;
            border: 1px solid #fca5a5;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        /* Form Styling */
        .loyalty-form {
            margin-top: 1.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
            margin-bottom: 1.2rem;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        .form-control::placeholder {
            color: #9ca3af;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .loyalty-container {
                padding: 1.5rem;
                margin: 1.5rem;
            }

            .loyalty-title {
                font-size: 1.75rem;
            }
        }

        /* Main Container */
        .users-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .users-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Filter Links */
        .filter-links {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .filter-link {
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            position: relative;
            transition: all 0.2s ease;
        }

        .filter-link:hover {
            color: #d97706;
        }

        .filter-link.active {
            color: #d97706;
            font-weight: 600;
        }

        .filter-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #d97706;
        }

        /* Users Table */
        .users-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .users-table th {
            background-color: #D97706;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .users-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .users-table tr:last-child td {
            border-bottom: none;
        }

        .users-table tr:hover {
            background-color: #FFF7ED;
        }

        /* Role Badges */
        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .role-staff {
            background-color: #EFF6FF;
            color: #1D4ED8;
        }

        .role-customer {
            background-color: #ECFDF5;
            color: #047857;
        }

        /* Action Links */
        .action-links {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .action-link {
            color: #3B82F6;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .action-link:hover {
            color: #1D4ED8;
            text-decoration: underline;
        }

        .delete-btn {
            background-color: #FEE2E2;
            color: #DC2626;
            border: none;
            border-radius: 6px;
            padding: 0.375rem 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .delete-btn:hover {
            background-color: #FECACA;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .users-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .users-title {
                font-size: 1.75rem;
            }

            .filter-links {
                flex-wrap: wrap;
            }

            .users-table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Main Container */
        .add-user-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .add-user-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Select Dropdown Styling */
        .form-control-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Success Message */
        .alert-success {
            padding: 1rem;
            background-color: #d1fae5;
            color: #065f46;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #059669;
        }

        /* Error Message */
        .alert-danger {
            padding: 1rem;
            background-color: #fee2e2;
            color: #b91c1c;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border-left: 4px solid #dc2626;
        }

        .alert-danger ul {
            margin: 0.5rem 0 0 1rem;
            padding-left: 1rem;
        }

        .alert-danger li {
            margin-bottom: 0.25rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .add-user-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .add-user-title {
                font-size: 1.75rem;
            }
        }

        /* Main Container */
        .edit-user-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .edit-user-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Select Dropdown Styling */
        .form-control-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        /* Submit Button */
        .submit-btn {
            width: 100%;
            padding: 1rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .edit-user-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .edit-user-title {
                font-size: 1.75rem;
            }
        }

        /* Main Container */
        .users-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Header Section */
        .users-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        /* Page Title */
        .users-title {
            font-size: 2rem;
            color: #2d3748;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Create Button */
        .create-btn {
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .create-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Filter Links */
        .filter-links {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .filter-link {
            color: #4b5563;
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            position: relative;
            transition: all 0.2s ease;
        }

        .filter-link:hover {
            color: #d97706;
        }

        .filter-link.active {
            color: #d97706;
            font-weight: 600;
        }

        .filter-link.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: #d97706;
        }

        /* Users Table */
        .users-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }

        .users-table th {
            background-color: #D97706;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .users-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .users-table tr:last-child td {
            border-bottom: none;
        }

        .users-table tr:hover {
            background-color: #FFF7ED;
        }

        /* Role Badges */
        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .role-staff {
            background-color: #EFF6FF;
            color: #1D4ED8;
        }

        .role-customer {
            background-color: #ECFDF5;
            color: #047857;
        }

        .role-admin {
            background-color: #F5F3FF;
            color: #7C3AED;
        }

        /* Action Links */
        .action-links {
            display: flex;
            gap: 0.75rem;
            align-items: center;
        }

        .action-link {
            color: #3B82F6;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
        }

        .action-link:hover {
            color: #1D4ED8;
            text-decoration: underline;
        }

        .delete-btn {
            background-color: #FEE2E2;
            color: #DC2626;
            border: none;
            border-radius: 6px;
            padding: 0.375rem 0.75rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }

        .delete-btn:hover {
            background-color: #FECACA;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .users-container {
                padding: 1.5rem;
                margin: 1rem;
            }

            .users-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .users-title {
                font-size: 1.75rem;
            }

            .filter-links {
                flex-wrap: wrap;
            }

            .users-table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Main Container */
        .user-detail-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .user-detail-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* User Info Section */
        .user-info {
            margin-bottom: 2rem;
        }

        .info-item {
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }

        .info-label {
            font-weight: 600;
            color: #4a5568;
            display: inline-block;
            min-width: 180px;
        }

        /* Role Badge */
        .role-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .role-staff {
            background-color: #EFF6FF;
            color: #1D4ED8;
        }

        .role-customer {
            background-color: #ECFDF5;
            color: #047857;
        }

        .role-admin {
            background-color: #F5F3FF;
            color: #7C3AED;
        }

        /* Shifts Section */
        .shifts-title {
            font-size: 1.5rem;
            color: #2d3748;
            margin: 2rem 0 1rem;
            padding-bottom: 0.5rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .no-shifts {
            color: #718096;
            font-style: italic;
        }

        /* Shifts Table */
        .shifts-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            background-color: white;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 2rem;
        }

        .shifts-table th {
            background-color: #D97706;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .shifts-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
        }

        .shifts-table tr:last-child td {
            border-bottom: none;
        }

        .shifts-table tr:hover {
            background-color: #FFF7ED;
        }

        /* Back Link */
        .back-link {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #f0f0f0;
            color: #4a5568;
            text-decoration: none;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            background-color: #e2e8f0;
            transform: translateY(-2px);
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .user-detail-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .user-detail-title {
                font-size: 1.75rem;
            }

            .info-label {
                display: block;
                margin-bottom: 0.25rem;
            }

            .shifts-table {
                display: block;
                overflow-x: auto;
            }
        }

        /* Button Styles */
        .shift-btn {
            display: inline-flex;
            align-items: center;
            padding: 0.625rem 1.25rem;
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
            font-size: 0.875rem;
            line-height: 1.25rem;
        }

        .btn-primary {
            background-color: #D97706;
            color: white;
            border: 1px solid #D97706;
        }

        .btn-primary:hover {
            background-color: #B45309;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .btn-secondary {
            background-color: white;
            color: #4B5563;
            border: 1px solid #E5E7EB;
        }

        .btn-secondary:hover {
            background-color: #F9FAFB;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        /* Table Styles */
        .shift-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 1.5rem;
        }

        .shift-table thead th {
            background-color: #F9FAFB;
            color: #374151;
            font-weight: 600;
            text-align: left;
            padding: 0.75rem 1.5rem;
            border-bottom: 1px solid #E5E7EB;
        }

        .shift-table tbody td {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #E5E7EB;
            vertical-align: middle;
        }

        .shift-table tbody tr:last-child td {
            border-bottom: none;
        }

        .shift-table tbody tr:hover {
            background-color: #FFF7ED;
        }

        /* Status Badges */
        .status-badge {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        .status-assigned {
            background-color: #EFF6FF;
            color: #1D4ED8;
        }

        .status-completed {
            background-color: #ECFDF5;
            color: #047857;
        }

        .status-unassigned {
            background-color: #F3F4F6;
            color: #6B7280;
        }

        /* Action Button */
        .action-btn {
            color: #3B82F6;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0;
        }

        .action-btn:hover {
            color: #1D4ED8;
            text-decoration: underline;
        }

        /* Shift Creation Container */
        .shift-create-container {
            max-width: 500px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .shift-title {
            font-size: 1.75rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Time Inputs Grid */
        .time-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        /* Submit Button */
        .submit-btn {
            padding: 0.875rem 1.5rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Back Link */
        .back-link {
            color: #d97706;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .back-link:hover {
            color: #b45309;
            text-decoration: underline;
        }

        /* Button/Link Container */
        .action-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 2rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .shift-create-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .time-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Schedule Container */
        .schedule-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .schedule-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* View Toggle Buttons */
        .view-toggle {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .view-btn {
            padding: 0.5rem 1rem;
            border-radius: 6px;
            font-weight: 500;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .view-btn.active {
            background-color: #d97706;
            color: white;
        }

        .view-btn.inactive {
            background-color: #f8fafc;
            color: #4a5568;
            border: 1px solid #e2e8f0;
        }

        .view-btn.inactive:hover {
            background-color: #f0f4f8;
        }

        /* Day Section */
        .day-section {
            margin-bottom: 2.5rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .day-section:last-child {
            border-bottom: none;
        }

        .day-title {
            font-size: 1.5rem;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        /* Shift Item */
        .shift-item {
            padding: 1.25rem;
            border-radius: 8px;
            background-color: #f8fafc;
            margin-bottom: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.2s ease;
        }

        .shift-item:hover {
            background-color: #f0f4f8;
            transform: translateY(-2px);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .shift-time {
            font-weight: 600;
            color: #2d3748;
        }

        .shift-assignment {
            margin-left: 1.5rem;
            color: #4a5568;
        }

        .unassigned {
            color: #991b1b;
            font-style: italic;
        }

        /* Assign Form */
        .assign-form {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-select {
            padding: 0.5rem;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            background-color: white;
            min-width: 200px;
        }

        .assign-btn {
            padding: 0.5rem 1.25rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .assign-btn:hover {
            background-color: #b45309;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .shift-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .assign-form {
                width: 100%;
                flex-direction: column;
                align-items: flex-start;
            }

            .user-select {
                width: 100%;
            }

            .assign-btn {
                width: 100%;
            }
        }

        /* Inventory Container */
        .inventory-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Warning Alert */
        .low-stock-alert {
            background-color: #fee2e2;
            border: 1px solid #fca5a5;
            color: #b91c1c;
            padding: 1.25rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .low-stock-alert strong {
            font-weight: 600;
        }

        .low-stock-list {
            margin-top: 0.75rem;
            padding-left: 1.5rem;
        }

        .low-stock-list li {
            margin-bottom: 0.25rem;
        }

        /* New Ingredient Link */
        .new-ingredient-link {
            display: inline-block;
            margin-bottom: 1.5rem;
            color: #d97706;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .new-ingredient-link:hover {
            color: #b45309;
            text-decoration: underline;
        }

        /* Inventory Table */
        .inventory-table {
            width: 100%;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
        }

        .inventory-table th {
            background-color: #D97706;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .inventory-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .inventory-table tr:last-child td {
            border-bottom: none;
        }

        .inventory-table tr:hover {
            background-color: #FFF7ED;
        }

        /* Action Links */
        .action-link {
            color: #4a5568;
            text-decoration: none;
            margin-right: 1rem;
            transition: all 0.2s ease;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
        }

        .action-link.edit {
            color: #d97706;
        }

        .action-link.edit:hover {
            background-color: #FFEDD5;
        }

        .action-link.usage {
            color: #3b82f6;
        }

        .action-link.usage:hover {
            background-color: #EFF6FF;
        }

        /* Stock Indicators */
        .stock-quantity {
            font-weight: 500;
        }

        .stock-quantity.low {
            color: #b91c1c;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .inventory-table {
                display: block;
                overflow-x: auto;
            }

            .action-link {
                display: block;
                margin-bottom: 0.5rem;
                margin-right: 0;
            }
        }

        /* Form Container */
        .ingredient-form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Form Title */
        .form-title {
            font-size: 1.75rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Submit Button */
        .submit-btn {
            padding: 0.875rem 1.5rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .ingredient-form-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }
        }

        /* Main Container */
        .edit-ingredient-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .edit-title {
            font-size: 1.75rem;
            color: #2d3748;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
            text-align: center;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.75rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Button Styling */
        .submit-btn {
            padding: 1rem 1.5rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        .cancel-link {
            margin-left: 1rem;
            color: #4a5568;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s;
            padding: 1rem 0;
        }

        .cancel-link:hover {
            color: #d97706;
            text-decoration: underline;
        }

        /* Button Container */
        .button-container {
            display: flex;
            align-items: center;
            margin-top: 2rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .edit-ingredient-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .edit-title {
                font-size: 1.5rem;
            }

            .button-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .cancel-link {
                margin-left: 0;
            }
        }

        /* Main Container */
        .usage-container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .usage-title {
            font-size: 1.75rem;
            color: #2d3748;
            margin-bottom: 2rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Current Stock Info */
        .stock-info {
            background-color: #f8fafc;
            padding: 1.5rem;
            border-radius: 8px;
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .stock-label {
            font-weight: 600;
            color: #4a5568;
        }

        .stock-value {
            font-size: 1.25rem;
            font-weight: 700;
            color: #2d3748;
        }

        /* Usage Form */
        .usage-form {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
            padding-bottom: 2rem;
            border-bottom: 1px solid #e2e8f0;
        }

        .amount-input {
            flex: 1;
            padding: 0.875rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .amount-input:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        .submit-btn {
            padding: 0.875rem 1.5rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* History List */
        .history-title {
            font-size: 1.25rem;
            color: #2d3748;
            margin-bottom: 1rem;
        }

        .usage-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .usage-item {
            padding: 1.25rem;
            border-bottom: 1px solid #e2e8f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .usage-item:last-child {
            border-bottom: none;
        }

        .usage-amount {
            font-weight: 600;
            color: #d97706;
        }

        .usage-date {
            color: #718096;
            font-size: 0.875rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .usage-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }

            .usage-form {
                flex-direction: column;
            }

            .stock-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
            }
        }

        .detail-card {
            padding: 2rem;
        }

        .detail-item {
            display: flex;
            margin-bottom: 1.25rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid #f3f4f6;
        }

        .detail-label {
            flex: 0 0 180px;
            font-weight: 600;
            color: #4b5563;
        }

        .detail-value {
            flex: 1;
            color: #1f2937;
        }

        .status-badge {
            display: inline-block;
            padding: 0.35rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
            text-transform: capitalize;
        }

        .status-pending {
            background-color: #fef3c7;
            color: #92400e;
        }

        .status-delivered {
            background-color: #d1fae5;
            color: #065f46;
        }

        .status-processing {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .status-cancelled {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .edit-link {
            display: inline-flex;
            align-items: center;
            margin-top: 1.5rem;
            padding: 0.625rem 1.25rem;
            background-color: #3b82f6;
            color: white;
            border-radius: 0.375rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .edit-link:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2);
        }

        .edit-link svg {
            margin-right: 0.5rem;
            width: 1rem;
            height: 1rem;
        }

        .form-container {
            background-color: white;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4b5563;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 1rem;
            transition: all 0.2s;
            background-color: #f9fafb;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
            background-color: white;
        }

        .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234b5563' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        .submit-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #3b82f6;
            color: white;
            font-weight: 500;
            border-radius: 0.375rem;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .submit-btn:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.2);
        }

        .status-option {
            padding: 0.5rem;
        }

        .form-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #374151;
            font-size: 0.875rem;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.375rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #111827;
            background-color: #f9fafb;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-input:focus {
            outline: none;
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            background-color: #ffffff;
        }

        .submit-btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            padding: 0.75rem 1.5rem;
            background-color: #3b82f6;
            color: #ffffff;
            font-weight: 500;
            font-size: 1rem;
            line-height: 1.5;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: all 0.2s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #2563eb;
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        .submit-btn:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5);
        }

        @media (min-width: 640px) {
            .submit-btn {
                width: auto;
            }
        }

        /* Absence Form Container */
        .absence-form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        /* Page Title */
        .absence-form-title {
            font-size: 1.75rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Form Group Styling */
        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #4a5568;
            font-size: 1rem;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.2s ease;
            background-color: #f8fafc;
        }

        .form-control:focus {
            border-color: #d97706;
            outline: none;
            box-shadow: 0 0 0 3px rgba(217, 119, 6, 0.15);
            background-color: #fff;
        }

        /* Select Dropdown Styling */
        .form-control-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='%234a5568' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 1rem center;
            background-size: 16px 12px;
            padding-right: 2.5rem;
        }

        /* Textarea Styling */
        .form-control-textarea {
            min-height: 100px;
            resize: vertical;
        }

        /* Submit Button */
        .submit-btn {
            padding: 0.875rem 1.5rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
        }

        .submit-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Date Input Icons */
        input[type="date"]::-webkit-calendar-picker-indicator {
            filter: invert(0.5);
            padding-left: 0.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 640px) {
            .absence-form-container {
                padding: 1.5rem;
                margin: 1rem;
                box-shadow: none;
                border: 1px solid #e2e8f0;
            }
        }

        /* Absence Container */
        .absence-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        /* Page Title */
        .absence-title {
            font-size: 2rem;
            color: #2d3748;
            margin-bottom: 1.5rem;
            padding-bottom: 0.5rem;
            border-bottom: 3px solid #d97706;
        }

        /* Create Button */
        .create-btn {
            display: inline-block;
            padding: 0.75rem 1.5rem;
            background-color: #d97706;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            margin-bottom: 1.5rem;
        }

        .create-btn:hover {
            background-color: #b45309;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(217, 119, 6, 0.2);
        }

        /* Absence Table */
        .absence-table {
            width: 100%;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            border-collapse: separate;
            border-spacing: 0;
        }

        .absence-table th {
            background-color: #D97706;
            color: white;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
        }

        .absence-table td {
            padding: 1rem;
            border-bottom: 1px solid #e5e7eb;
            vertical-align: middle;
        }

        .absence-table tr:last-child td {
            border-bottom: none;
        }

        .absence-table tr:hover {
            background-color: #FFF7ED;
        }

        /* Status Indicators */
        .current-absence {
            background-color: #FEF3C7;
        }

        .future-absence {
            background-color: #ECFDF5;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .absence-table {
                display: block;
                overflow-x: auto;
            }

            .absence-title {
                font-size: 1.5rem;
            }

            .create-btn {
                width: 100%;
                text-align: center;
            }
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
        <x-nav /> <!-- Navigation component -->

        <!-- Page Content -->
        <main class="relative">
            {{ $slot }}
        </main>
        <x-footer />
    </div>
</body>

</html>