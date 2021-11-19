<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ env('APP_NAME', 'Shortlinks.') }}</title>
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="w-full md:w-1/2 mx-auto sm:px-6 lg:px-8 space-y-4">
                <div class="mx-auto text-6xl font-bold text-primary">{{ env('APP_NAME', 'Shortlinks.') }}</div>
                <form action="{{ route('links.store') }}" method="post" class="mb-6">
                    @csrf
                    <div class="form-control">
                        <div class="relative">
                            <input type="text" name="link" placeholder="URL" class="w-full input-lg pr-16 input input-primary input-bordered" required>
                            <button class="absolute btn-lg top-0 right-0 rounded-l-none btn btn-primary">create</button>
                        </div>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('data'))
                    <div class="text-center space-y-2 text-primary-focus">
                        <div>{{ session('data.message') }}</div>
                    </div>
                    
                    <div class="alert alert-success flex flex-col space-y-8">
                        <div class="w-full flex flex-row justify-between">
                            <label class="text-lg font-bold">{{ url(session('data.link.code')) }}</label>
                            <div class="text-left tooltip tooltip-info" data-tip="click to copy link" 
                            onclick="navigator.clipboard.writeText('{{ url(session('data.link.code')) }}');document.querySelector('.tooltip').setAttribute('data-tip', 'link copied to clipbroad')" >
                                <x-icons.clipboard/>
                            </div>
                        </div>
                        
                    </div>
                @endif
            </div>
        </div>
    </body>
</html>
