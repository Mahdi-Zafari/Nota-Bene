<!DOCTYPE html>
<html lang="en" class="bg-gray-100 dark:bg-gray-900">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Nota Bene') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/app_logo_circle.png') }}">

    @vite('resources/css/app.css')
</head>
<body class="min-h-screen flex items-center justify-center">
<div class="text-center">

    <!-- logo -->
    <a href="/">
        <img src="{{ asset('images/app_logo.png') }}" alt="{{ config('app.name', 'Nota Bene') }}" class="w-24 h-24 rounded-full my-5 mx-auto">
    </a>

    <!-- Title -->
    <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-6">
        Welcome to Nota Bene
    </h1>

    <!-- Subtitle -->
    <p class="text-lg text-gray-600 dark:text-gray-300 mb-8">
        Manage your daily tasks with ease.
    </p>

    <!-- Buttons -->
    <div class="flex justify-center space-x-4">
        @guest
            <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-all duration-300">
                Login
            </a>
            <a href="{{ route('register') }}" class="text-blue-500 hover:text-blue-700 px-6 py-2 rounded-lg transition-all duration-300">
                Register
            </a>
        @endguest

        @auth
            <a href="{{ route('dashboard') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-all duration-300">
                Dashboard
            </a>
        @endauth
    </div>
</div>
</body>
</html>
