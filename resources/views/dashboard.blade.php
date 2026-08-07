<x-app-layout>

<div class="py-10 bg-gray-50 min-h-screen">

    <div class="max-w-7xl mx-auto px-6">


        <!-- Header -->

        <div class="mb-8">

            <h1 class="text-3xl font-bold text-gray-800">
                Bonjour {{ Auth::user()->name }} 👋
            </h1>

            <p class="text-gray-500 mt-2">
                Bienvenue dans votre espace de gestion des projets de recherche Grimoire.
            </p>

        </div>



        <!-- Statistics Cards -->

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">


            <!-- Projects -->

            <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-indigo-500">

                <div class="flex justify-between">

                    <div>

                        <p class="text-gray-500">
                            Mes projets
                        </p>


                        <h2 class="text-4xl font-bold text-indigo-600 mt-3">
                            3
                        </h2>

                    </div>


                    <div class="text-4xl">
                        📁
                    </div>

                </div>

            </div>



            <!-- Members -->


            <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-green-500">


                <div class="flex justify-between">


                    <div>

                        <p class="text-gray-500">
                            Membres
                        </p>


                        <h2 class="text-4xl font-bold text-green-600 mt-3">
                            {{ $membersCount }}
                        </h2>

                    </div>


                    <div class="text-4xl">
                        👥
                    </div>


                </div>


            </div>



            <!-- Notifications -->


            <div class="bg-white rounded-2xl shadow p-6 border-l-4 border-yellow-500">


                <div class="flex justify-between">


                    <div>

                        <p class="text-gray-500">
                            Notifications
                        </p>


                        <h2 class="text-4xl font-bold text-yellow-600 mt-3">
                            5
                        </h2>


                    </div>


                    <div class="text-4xl">
                        🔔
                    </div>


                </div>


            </div>


        </div>





        <!-- Projects Section -->

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">



            <!-- Recent Projects -->


            <div class="lg:col-span-2 bg-white rounded-2xl shadow p-6">


                <div class="flex justify-between items-center mb-5">


                    <h2 class="text-xl font-bold text-gray-800">
                        📚 Projets récents
                    </h2>


                   <a href="{{ route('projects.create') }}"
   class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 inline-block">
    + Nouveau projet
</a>


                </div>



                <div class="space-y-4">



                    <div class="border rounded-xl p-4">


                        <div class="flex justify-between">

                            <h3 class="font-bold">
                                Projet Intelligence Artificielle
                            </h3>


                            <span class="text-sm bg-green-100 text-green-700 px-3 py-1 rounded-full">
                                En cours
                            </span>


                        </div>


                        <p class="text-gray-500 mt-2">
                            Recherche sur les modèles IA.
                        </p>



                        <!-- Progress -->

                        <div class="mt-4">

                            <div class="flex justify-between text-sm">

                                <span>
                                    Avancement
                                </span>

                                <span>
                                    70%
                                </span>

                            </div>


                            <div class="bg-gray-200 rounded-full h-2 mt-2">

                                <div class="bg-indigo-600 h-2 rounded-full w-[70%]">
                                </div>

                            </div>


                        </div>


                    </div>




                    <div class="border rounded-xl p-4">


                        <div class="flex justify-between">


                            <h3 class="font-bold">
                                Projet Environnement
                            </h3>


                            <span class="text-sm bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
                                Recherche
                            </span>


                        </div>


                        <p class="text-gray-500 mt-2">
                            Analyse des données environnementales.
                        </p>


                    </div>


                </div>


            </div>





            <!-- Activities -->


            <div class="bg-white rounded-2xl shadow p-6">


                <h2 class="text-xl font-bold mb-5">
                    🔔 Activités récentes
                </h2>



                <ul class="space-y-4">


                    <li class="border-b pb-3">

                        👤 Nouveau membre ajouté

                        <p class="text-sm text-gray-500">
                            Il y a 2 heures
                        </p>

                    </li>


                    <li class="border-b pb-3">

                        📁 Projet modifié

                        <p class="text-sm text-gray-500">
                            Hier
                        </p>

                    </li>


                    <li>

                        📄 Rapport généré

                        <p class="text-sm text-gray-500">
                            Il y a 3 jours
                        </p>

                    </li>


                </ul>


            </div>


        </div>



    </div>


</div>


</x-app-layout>