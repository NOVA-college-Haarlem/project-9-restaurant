<x-app-layout>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="hero-overlay absolute inset-0"></div>
        <div class="relative text-center z-10 px-4">
            <h1 class="hero-title">Welkom bij Los Pollos Hermanos</h1>
            <p class="hero-subtitle">Proef de authentieke smaak van New Mexico sinds 1992</p>
            <a href="{{ route('reservations.create') }}" class="btn-reserve">Reserveer Nu</a>
        </div>
    </div>


    <!-- Features Section -->
    <div class="features-section">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="section-divider"></div>
                <h2 class="text-3xl font-bold text-slate-800 mt-4">Ontdek Ons Restaurant</h2>
                <br>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Digitaal Menu -->
                <div class="feature-card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    <h3>Digitaal Menu</h3>
                    <p>Ontdek ons actuele aanbod met gedetailleerde beschrijvingen en allergie-informatie.</p>
                    <a href="{{ route('menu-board.index') }}">Bekijk menu →</a>
                </div>

                <!-- Reserveringen -->
                <div class="feature-card">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <h3>Reserveringen</h3>
                    <p>Plan uw bezoek en reserveer eenvoudig online.</p>
                    <a href="{{ route('reservations.create') }}">Reserveer nu →</a>
                </div>

                <!-- Loyaliteit -->
                <div class="feature-card">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2l2.9 6.2 6.6.6-5 4.6 1.5 6.5L12 17.3l-5.9 2.6 1.5-6.5-5-4.6 6.6-.6L12 2z" />
                    </svg>

                    <h3>Loyaliteit</h3>
                    <p>Verdien punten en geniet van exclusieve voordelen.</p>
                    <a href="{{ route('loyalty.index') }}">Je status →</a>
                </div>
            </div>

        </div>
        <div class="testimonial-carousel">
            <h2>Wat onze klanten zeggen</h2>
            <p>"Het was een geweldige ervaring! De meth was fantastisch."</p>
            <p>"De sfeer was zo gezellig, ik beb walter white ontmoet!"</p>
        </div>
</x-app-layout>