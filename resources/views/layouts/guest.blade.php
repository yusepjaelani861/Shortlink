<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        .finish {
            background-color: #2b6cb0;
        }
        .finish:hover {
            background-color: #2c5282;
        }
        .submit-password {
            background-color: #63b3ed;
        }
        .submit-password:hover {
            background-color: #3182ce;
        }
    </style>
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        <div class="flex justify-between p-2 md:max-w-7xl max-w-2xl mx-auto">
            <a href="/"><h1 class="text-3xl font-bold px-2 text-center">{{ config('app.name') }}</h1></a>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded">Login</button>
        </div>
        <div class="border w-full"></div>
        <main class="max-w-3xl mx-auto py-4 px-2">
            {{ $slot }}
        </main>
    </div>

    <footer class="bg-gray-100 text-center text-md p-4 w-full border-t">
        <div class="max-w-2xl md:max-w-7xl mx-auto flex justify-between">
            <p>&copy;2022 <a href="/" class="text-blue-500 hover:text-blue-700 font-bold">{{ config('app.name') }}</a>. All rights reserved.</p>
            <p>Created by <a href="https://yusep.my.id" target="_blank" rel="noopener noreferrer" class="text-blue-500 hover:text-blue-700 font-bold">Yusep Jaelani</a></p>
        </div>
    </footer>
</body>

</html>
