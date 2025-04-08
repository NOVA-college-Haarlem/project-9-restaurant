<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <h1 class="text-4xl font-extrabold text-amber-600 mb-12 text-center">Alle Links</h1>

        <!-- Flex container voor links met meer ruimte -->
        <div class="links-container">
            <!-- Home link -->
            <div class="link-card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Home</h3>
                <a href="{{ route('home') }}" class="text-lg text-gray-800 hover:text-amber-600">Home</a>
            </div>

            <!-- Restaurant Dropdown Links -->
            <div class="link-card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Restaurant</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('events.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Evenementen</a>
                    </li>
                    <li>
                        <a href="{{ route('menu-board.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Menu Board</a>
                    </li>
                    <li>
                        <a href="{{ route('digital-menus.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Digitale Menu's</a>
                    </li>
                </ul>
            </div>

            <!-- Bestellen -->
            <div class="link-card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Bestellen</h3>
                <a href="{{ route('orders.place') }}" class="text-lg text-gray-700 hover:text-amber-600">Bestellen</a>
            </div>

            <!-- Reserveringen Dropdown Links -->
            <div class="link-card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Reserveren</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('reservations.create') }}" class="text-lg text-gray-700 hover:text-amber-600">Nieuwe Reservering</a>
                    </li>
                    <li>
                        <a href="{{ route('tables.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Tafels</a>
                    </li>
                    <li>
                        <a href="{{ route('waitlist.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Wachtlijst</a>
                    </li>
                </ul>
            </div>

            <!-- Admin Links -->
            <div class="link-card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Beheer</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('users.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Medewerkers</a>
                    </li>
                    <li>
                        <a href="{{ route('shifts.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Diensten</a>
                    </li>
                    <li>
                        <a href="{{ route('shifts.schedule') }}" class="text-lg text-gray-700 hover:text-amber-600">Rooster</a>
                    </li>
                    <li>
                        <a href="{{ route('ingredients.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Ingrediënten</a>
                    </li>
                    <li>
                        <a href="{{ route('ingredient-orders.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Leveranciers</a>
                    </li>
                    <li>
                        <a href="{{ route('absences.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Afwezigheden</a>
                    </li>
                </ul>
            </div>

            <!-- Loyaliteit -->
            <div class="link-card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Loyaliteit</h3>
                <a href="{{ route('loyalty.index') }}" class="text-lg text-gray-700 hover:text-amber-600">Loyaliteit</a>
            </div>

            <!-- Feedback -->
            <div class="link-card">
                <h3 class="text-xl font-semibold text-gray-800 mb-4">Feedback</h3>
                <a href="{{ route('feedback.create') }}" class="text-lg text-gray-700 hover:text-amber-600">Feedback</a>
            </div>
        </div>
    </div>
</x-app-layout>
