<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            <div class="max-w-7xl mx-auto p-6 lg:p-8">
                <div class="flex justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 329.71 219.25" class="h-16 w-auto bg-gray-100 dark:bg-gray-900 fill-gray-100 dark:fill-gray-900">
                        <path d="M37.32,88.05l-5.85,17.85H13.02L52.07,0h19.8l-1.25,105.9h-18.45l.3-17.85h-15.15ZM53.22,72.3l-.09-34.24-11.41,34.24h11.5Z"/>
                        <path d="M290.26,198.12l.3,17.85h-18.45s-1.25-105.9-1.25-105.9h19.8s39.05,105.9,39.05,105.9h-18.45s-5.85-17.85-5.85-17.85h-15.15ZM301.01,182.37l-11.41-34.24-.09,34.24h11.5Z"/>
                        <path d="M107.96,105.9l-13.35-51v51h-18.6V0h17.55l13.35,52.65V0h18.6v105.9h-17.55Z"/>
                        <path d="M129.65,0h24.6c14.55,0,24.6,9.9,24.6,27.75v50.7c0,17.85-10.05,27.45-24.6,27.45h-24.6V0ZM148.25,88.2h3.75c3.75,0,8.55-1.05,8.55-9.9V27.9c0-8.85-4.5-10.05-8.55-10.05h-3.75v70.35Z"/>
                        <path d="M268.94,106.14l-9.15-45.9h-3.9v45.9h-18.6V.24h18.6v43.8h3.9L268.94.24h20.1l-13.2,51.45,13.2,54.45h-20.1Z"/>
                        <path d="M94.46,215.9h-18.45v-105.9h18.45l13.65,63.3,13.8-63.3h18.45v105.9h-18.45v-50.4l-7.95,35.55h-11.7l-7.8-35.25v50.1Z"/>
                        <path d="M165.7,128v25.95h17.4v16.2h-17.4v27.9h22.8v17.85h-41.25v-105.9h41.25v18h-22.8Z"/>
                        <path d="M192.65,110h24.6c14.55,0,24.6,9.9,24.6,27.75v50.7c0,17.85-10.05,27.45-24.6,27.45h-24.6v-105.9ZM211.25,198.2h3.75c3.75,0,8.55-1.05,8.55-9.9v-50.4c0-8.85-4.5-10.05-8.55-10.05h-3.75v70.35Z"/>
                        <path d="M245.99,215.9v-105.9h18.45v105.9h-18.45Z"/>
                        <path d="M198.44,88.29l-2.85,17.85h-18.45L196.19.24h19.8l18.75,105.9h-18.45l-2.7-17.85h-15.15ZM211.34,72.54l-5.1-40.05-5.4,40.05h10.5Z"/>
                        <path style="fill: #be4b27;" d="M71.09,162.38c-1.37,1.14-3.19,1.6-4.9,1.37s-3.31-1.25-4.33-2.62c-3.88-5.93-6.84-12.31-8.66-19.15-3.99-2.85-7.3-6.5-9.58-10.94-.46-4.9-4.45-8.66-9.35-9.01-1.6.23-3.19-.8-3.65-2.39-.34-2.96-2.05-5.59-4.56-7.07-1.82-1.03-3.88-1.48-5.93-1.25-1.71.23-3.19,1.14-4.22,2.51-1.14,1.6-1.94,3.42-2.17,5.36-.11.57.23,1.25.8,1.37h.23c.23,0,.23.23.23.34q0,.11-.11.23c-.23.46-.11,1.03.34,1.37,1.25,1.03,2.28,2.39,2.96,3.76-.11,1.82,1.03,3.53,2.74,4.22.68,3.19.34,6.5-.8,9.46-1.94,5.36-5.36,10.03-9.92,13.45-3.42,1.71-6.16,4.56-7.87,8.09-1.71,1.14-2.62,3.19-2.28,5.24s1.94,3.65,3.99,3.99c-1.14-2.28-.23-5.02,2.05-6.04,6.95-.91,13.11-4.9,16.53-10.94,1.03,1.14,2.62,1.82,4.22,1.71.11,5.13,1.71,10.26,4.45,14.59-2.96,5.81-6.38,11.4-10.15,16.76-1.6,2.28-2.39,5.24-1.82,7.98,1.03,5.47,1.03,11.06,0,16.53,0,.23-.11.34-.23.46-2.39,2.05-5.47,3.08-8.66,2.85-.68,0-1.48.23-1.82.91h0c-.8,1.37,0,3.08,1.6,3.31,5.7.68,11.51.57,17.21-.34.91-.11,1.71-.91,1.82-1.82,1.25-5.7,1.94-11.63,1.71-17.44-.11-2.51,1.37-4.9,3.65-6.04,2.96-1.48,5.59-3.42,7.87-5.7,2.05,6.73,5.59,13,10.37,18.13.57.57,1.25,1.14,1.94,1.71.68.57,1.03,1.37.91,2.28,0,1.14-.8,2.05-1.82,2.51-1.25.68-2.74.91-4.22.8-1.48-.23-2.74,1.37-1.94,2.74h0c6.27,1.37,12.88,1.03,19.04-.8,1.37-.8,2.05-2.39,1.71-3.88-.11-.8-.57-1.6-1.14-2.17-1.37-1.25-2.39-2.74-3.08-4.45-1.71-4.1-4.1-7.87-6.84-11.17-1.6-1.03-2.62-2.62-2.96-4.56,1.14-5.47,1.03-11.17-.46-16.64-1.14-2.96-1.71-6.27-1.48-9.46,2.74,3.42,6.27,6.16,10.37,8.09,1.14.34,2.51.34,3.53-.34s1.94-1.6,2.17-2.85c1.25-.11,2.39-.8,2.96-1.94.57-.68.34-2.05-.46-3.08ZM18.54,122.94l-.34.34c-.11.11-.34.11-.46.11-.23,0-.34-.11-.68-.23,0-.34.11-.46.23-.68l.34-.34c.11-.11.34-.11.46-.11.23,0,.34.11.68.23,0,.34-.11.57-.23.68ZM21.85,121.34c-.11.23-.23.34-.46.46-.11.11-.34.11-.57.23-.23,0-.46,0-.8-.11,0-.34.11-.57.23-.68.11-.23.23-.34.46-.46.11-.11.34-.11.57-.23.23,0,.46,0,.8.11,0,.23-.11.46-.23.68Z"/>
                    </svg>
                </div>

                <div class="mt-16">
                    <div class="grid grid-cols-1 max-w-3xl space-y-6 text-center justify-items-center">
                        <h2 class="text-5xl font-thin dark:text-gray-200">{{ __('Cert Verification') }}</h2>
                        <p class="dark:text-gray-400">
                            {{ __('Verify the validity of Andak certification numbers using the form field. Always confirm certification numbers for collectibles purchased online after receipt.') }}
                        </p>

                        <form method="post" action="{{ route('item.certify') }}" class="flex flex-row items-start space-x-3 w-2/3">
                            @csrf
                            <span class="flex flex-auto flex-col">
                                <input type="text" name="search" value="{{ old('search') }}" class="flex-auto px-3 py-2 rounded-lg border border-slate-100 @error('search') border-red-800 @enderror" />
                                @error('search')
                                    <small class="text-red-800 dark:text-red-600 mt-2">{{ $errors->first('search') }}</small>
                                @enderror
                            </span>
                            <button type="submit" class="px-6 py-2 bg-andak rounded-lg text-white hover:bg-andak-dark hover:text-slate-300 transition-colors">{{ __('Verify') }}</button>
                        </form>
                    </div>
                </div>

                <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
                        <div class="flex items-center gap-4">
                            <a href="https://github.com/sponsors/taylorotwell" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="-mt-px mr-1 w-5 h-5 stroke-gray-400 dark:stroke-gray-600 group-hover:stroke-gray-600 dark:group-hover:stroke-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
