<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Task Manager app</title>
    @vite(['resources/js/app.js'])
</head>

<body>
    <header>
        <h1 class="text-primary text-center">Task manager app</h1>
    </header>

    <section class="mt-4">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="text-center">
                    @yield('actions')
                </div>
                @yield('content')
            </div>
        </div>
    </section>
</body>

</html>
