<header class="bg-white flex items-center justify-between px-4 h-16 sticky top-0 z-50 shadow-sm">
    <!-- Logo (siempre visible) -->
    <div class="flex items-center">
        <a href="/" class="text-lg font-bold text-moradoprin">LOGO</a>
    </div>

    <!-- Botón Hamburguesa (solo móvil) -->
    <button id="menu-toggle" 
            class="lg:hidden text-moradoprin hover:text-orange-600 focus:outline-none">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>

    <!-- Menú Desktop (solo PC) - OCULTO en móvil -->
    <nav class="hidden lg:flex lg:items-center lg:space-x-8">
        <!-- La Cofradía -->
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button"
                class="text-moradoprin hover:text-orange-600 font-bold bg-transparent border-0 p-0 cursor-pointer">
                La Cofradía</div>
            <ul tabindex="-1" class="menu dropdown-content bg-white z-10 mt-6 w-52 p-2 shadow-sm">
                <li><a href="{{ route('cofradia') }}#origen"
                        class="text-moradoprin hover:text-orange-600 font-bold">Origen</a></li>
                <li><a href="{{ route('cofradia') }}#estandartes"
                        class="text-moradoprin hover:text-orange-600 font-bold">Estandartes</a></li>
                <li><a href="{{ route('cofradia') }}#emblema"
                        class="text-moradoprin hover:text-orange-600 font-bold">Emblema y escudo</a></li>
            </ul>
        </div>

        <!-- Noticias -->
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button"
                class="text-moradoprin hover:text-orange-600 font-bold bg-transparent border-0 p-0 cursor-pointer">
                Noticias</div>
            <ul tabindex="-1" class="menu dropdown-content bg-white z-10 mt-6 w-52 p-2 shadow-sm">
                <li><a class="text-moradoprin hover:text-orange-600 font-bold">Item 1</a></li>
                <li><a class="text-moradoprin hover:text-orange-600 font-bold">Item 2</a></li>
            </ul>
        </div>

        <!-- Semana Santa -->
        <div class="dropdown dropdown-end">
            <div tabindex="0" role="button"
                class="text-moradoprin hover:text-orange-600 font-bold bg-transparent border-0 p-0 cursor-pointer">
                Semana Santa</div>
            <ul tabindex="-1" class="menu dropdown-content bg-white z-10 mt-6 w-52 p-2 shadow-sm">
                <li><a class="text-moradoprin hover:text-orange-600 font-bold">Item 1</a></li>
                <li><a class="text-moradoprin hover:text-orange-600 font-bold">Item 2</a></li>
            </ul>
        </div>

        <!-- Área Privada / Salir -->
        @auth
            <a href="{{ route('dashboard') }}"
               class="text-moradoprin hover:text-orange-600 font-bold">
                Dashboard
            </a>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit"
                        class="text-moradoprin hover:text-orange-600 font-bold">
                    Salir
                </button>
            </form>
        @else
            <a href="{{ route('login') }}"
               class="text-moradoprin hover:text-orange-600 font-bold">
                Área Privada
            </a>
        @endauth
    </nav>

    <!-- Botón "Área Privada" (siempre visible en móvil) -->
    <div class="lg:hidden">
        @auth
            <a href="{{ route('dashboard') }}"
               class="text-moradoprin hover:text-orange-600 font-bold text-sm">
                Area privada
            </a>
        @else
            <a href="{{ route('login') }}"
               class="bg-moradoprin hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-bold text-sm transition-all">
                Área Privada
            </a>
        @endauth
    </div>
</header>

<!-- Menú Mobile (hamburguesa desplegable) -->
<div id="mobile-menu" class="hidden lg:hidden bg-white shadow-lg">
    <nav class="flex flex-col p-4 space-y-4">
        <!-- La Cofradía -->
        <div>
            <button onclick="toggleSubmenu('cofradia')" 
                    class="w-full text-left text-moradoprin hover:text-orange-600 font-bold flex justify-between items-center">
                La Cofradía
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div id="submenu-cofradia" class="hidden pl-4 mt-2 space-y-2">
                <a href="{{ route('cofradia') }}#origen"
                   class="block text-gray-600 hover:text-orange-600">Origen</a>
                <a href="{{ route('cofradia') }}#estandartes"
                   class="block text-gray-600 hover:text-orange-600">Estandartes</a>
                <a href="{{ route('cofradia') }}#emblema"
                   class="block text-gray-600 hover:text-orange-600">Emblema y escudo</a>
            </div>
        </div>

        <!-- Noticias -->
        <div>
            <button onclick="toggleSubmenu('noticias')" 
                    class="w-full text-left text-moradoprin hover:text-orange-600 font-bold flex justify-between items-center">
                Noticias
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div id="submenu-noticias" class="hidden pl-4 mt-2 space-y-2">
                <a href="#" class="block text-gray-600 hover:text-orange-600">Item 1</a>
                <a href="#" class="block text-gray-600 hover:text-orange-600">Item 2</a>
            </div>
        </div>

        <!-- Semana Santa -->
        <div>
            <button onclick="toggleSubmenu('semana')" 
                    class="w-full text-left text-moradoprin hover:text-orange-600 font-bold flex justify-between items-center">
                Semana Santa
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </button>
            <div id="submenu-semana" class="hidden pl-4 mt-2 space-y-2">
                <a href="#" class="block text-gray-600 hover:text-orange-600">Item 1</a>
                <a href="#" class="block text-gray-600 hover:text-orange-600">Item 2</a>
            </div>
        </div>

        <!-- Salir (solo si está logueado) -->
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                        class="w-full text-left text-red-600 hover:text-red-800 font-bold">
                    Cerrar Sesión
                </button>
            </form>
        @endauth
    </nav>
</div>

<!-- JavaScript para el menú -->
<script>
    // Toggle menú principal
    document.getElementById('menu-toggle').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });

    // Toggle submenús
    function toggleSubmenu(id) {
        const submenu = document.getElementById('submenu-' + id);
        submenu.classList.toggle('hidden');
    }

    // Cerrar menú al hacer clic fuera
    document.addEventListener('click', function(event) {
        const menu = document.getElementById('mobile-menu');
        const toggle = document.getElementById('menu-toggle');
        
        if (!menu.contains(event.target) && !toggle.contains(event.target)) {
            menu.classList.add('hidden');
        }
    });
</script>