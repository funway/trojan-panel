<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="flex flex-col h-screen">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                <div class="px-5 flex lg:justify-center lg:col-start-2">
                    <x-application-logo class="block h-9 w-auto fill-current text-orange-600" />
                </div>
                @if (Route::has('login'))
                    <nav class="px-5 flex flex-1 justify-end">
                        @auth
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Dashboard
                            </a>
                        @else
                            <a
                                href="{{ route('login') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a
                                    href="{{ route('register') }}"
                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                >
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>

            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" />
            <div class="relative h-full flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white pb-32">
                <main class="text-gray-600">
                    <div class="flex flex-col items-center justify-center my-6">
                        <h1 class="text-6xl font-bold mb-4">{{ env('APP_NAME') }}</h1>
                        <!-- <p class="text-sm text-gray-600">Big Brother Is Watching You</p> -->
                    </div>
                    <blockquote class="border-l-4 border-gray-500 italic bg-gray-200 p-4">
                        "Big Brother Is Watching You."
                        <cite class="block mt-2 text-right text-sm">- George Orwell</cite>
                    </blockquote>
                </main>
            </div>

            <footer class="text-center text-sm text-black dark:text-white/70 p-6">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </body>
</html>
