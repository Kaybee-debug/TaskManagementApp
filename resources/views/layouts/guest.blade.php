<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            .brand-gradient {
                background: linear-gradient(135deg, #0077b5, #005885);
            }
            .brand-gradient:hover {
                background: linear-gradient(135deg, #005885, #004466);
            }
            html, body {
                margin: 0;
                padding: 0;
                height: 100%;
            }
            body {
                display: flex;
                flex-direction: column;
            }
        </style>
    </head>
    <body class="antialiased bg-white text-gray-800">
        <!-- Navigation -->
        <nav class="bg-white border-b shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <a href="{{ url('/') }}">
                            <div class="w-10 h-10 brand-gradient rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2"></path>
                                </svg>
                            </div>
                        </a>
                        <a href="{{ url('/') }}">
                            <h1 class="text-xl font-bold">TaskMaster</h1>
                        </a>
                    </div>

                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ route('tasks.index') }}" class="text-sm font-medium hover:text-blue-600">
                                My Tasks
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-sm font-medium hover:text-blue-600">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}"
                               class="brand-gradient text-white px-5 py-2 rounded-lg text-sm font-medium shadow transition">
                                Get Started
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>

        <div class="flex-1 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-50">
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-100 border-t">
            <div class="max-w-7xl mx-auto px-4 py-6 text-center text-sm text-gray-600">
                © {{ date('Y') }} TaskMaster — code2.0 Task Management System
            </div>
        </footer>
    </body>
</html>
