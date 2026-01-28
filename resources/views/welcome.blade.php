<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Management</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            .linkedin-blue {
                background-color: #0077b5;
            }
            .linkedin-blue:hover {
                background-color: #005885;
            }
        </style>
    </head>
    <body class="antialiased bg-white">
        <!-- Navigation -->
        <nav class="bg-white border-b border-gray-200 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <div class="w-10 h-10 linkedin-blue rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                            </svg>
                        </div>
                        <h1 class="text-2xl font-bold text-gray-900">TaskMaster</h1>
                    </div>
                    <div class="flex items-center gap-4">
                        @auth
                            <a href="{{ route('tasks.index') }}" class="text-gray-700 hover:text-gray-900 px-4 py-2 text-sm font-medium">
                                My Tasks
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-gray-700 hover:text-gray-900 px-4 py-2 text-sm font-medium">
                                Sign In
                            </a>
                            <a href="{{ route('register') }}" class="linkedin-blue text-white px-5 py-2 rounded-lg text-sm font-medium shadow-sm">
                                Get Started
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </body>
</html>
