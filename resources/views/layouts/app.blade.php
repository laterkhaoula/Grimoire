<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Grimoire</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

<nav class="bg-white shadow-md border-b">

    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">


        <!-- Logo -->

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3">

            <span class="text-3xl">
                📚
            </span>

            <span class="text-2xl font-bold text-indigo-700">
                Grimoire
            </span>

        </a>



        <!-- Navigation -->

        <div class="flex items-center gap-6">


            @auth


            <a href="{{ route('dashboard') }}"
               class="text-gray-700 hover:text-indigo-600 font-medium">

                Dashboard

            </a>



            <a href="{{ route('projects.index') }}"
               class="text-gray-700 hover:text-indigo-600 font-medium">

                Projets

            </a>


<a href="{{ route('members.index') }}"
   class="text-gray-700 hover:text-indigo-600 font-medium">
    Membres
</a>




            <!-- User -->

            <div class="flex items-center gap-3 border-l pl-5">


                <div>

                    <p class="font-semibold text-gray-800">
                        {{ Auth::user()->name }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Chercheur
                    </p>

                </div>



                <form method="POST"
                      action="{{ route('logout') }}">

                    @csrf

                    <button
                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">

                        Logout

                    </button>

                </form>


            </div>



            @else


            <a href="{{ route('login') }}"
            class="text-indigo-600 font-medium">

                Login

            </a>


            <a href="{{ route('register') }}"
            class="bg-indigo-600 text-white px-4 py-2 rounded-lg">

                Register

            </a>


            @endauth


        </div>


    </div>


</nav>


    <main>
        {{ $slot }}
    </main>


</body>

</html>