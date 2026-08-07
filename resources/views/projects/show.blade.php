<x-app-layout>

 <div class="max-w-5xl mx-auto py-8">

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif


    <h1 class="text-3xl font-bold mb-6">
        {{ $project->title }}
    </h1>


    <div class="bg-white shadow rounded-lg p-6 mb-8">

        <p class="mb-4">
            <strong>Description :</strong><br>
            {{ $project->description }}
        </p>


        <p class="mb-2">
            <strong>Status :</strong>
            {{ $project->status }}
        </p>


        <p>
            <strong>Avancement :</strong>
            {{ $project->avancement }} %
        </p>

    </div>



    {{-- ========================= --}}
    {{-- Mise à jour avancement --}}
    {{-- ========================= --}}

    @can('updateProgress', $project)

        <div class="bg-white shadow rounded-lg p-6 mb-8">

            <h2 class="text-xl font-bold mb-4">
                Mettre à jour l'avancement
            </h2>


            <form action="{{ route('projects.progress.update', $project) }}" method="POST">

                @csrf
                @method('PATCH')


                <input
                    type="number"
                    name="avancement"
                    min="0"
                    max="100"
                    value="{{ $project->avancement }}"
                    class="border rounded p-2 w-40">


                <button
                    type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded ml-3">

                    Mettre à jour

                </button>


            </form>

        </div>

    @endcan




    {{-- ========================= --}}
    {{-- Ajouter un membre --}}
    {{-- ========================= --}}

    @can('addMember', $project)

        <div class="bg-white shadow rounded-lg p-6 mb-8">

            <h2 class="text-xl font-bold mb-4">
                Ajouter un membre
            </h2>


            <form action="{{ route('projects.members.add', $project) }}" method="POST">

                @csrf


                <div class="mb-4">

                    <label class="block mb-2">
                        Utilisateur
                    </label>


                    <select
                        name="user_id"
                        class="border rounded p-2 w-full">


                        @foreach(\App\Models\User::all() as $user)

                            <option value="{{ $user->id }}">

                                {{ $user->name }}
                                ({{ $user->email }})

                            </option>

                        @endforeach


                    </select>

                </div>



                <div class="mb-4">

                    <label class="block mb-2">
                        Rôle
                    </label>


                    <select
                        name="role"
                        class="border rounded p-2 w-full">


                        <option value="chercheur">
                            Chercheur
                        </option>


                        <option value="etudiant_assistant">
                            Étudiant assistant
                        </option>


                    </select>

                </div>



                <button
                    class="bg-green-600 text-white px-4 py-2 rounded">

                    Ajouter

                </button>


            </form>


        </div>


    @endcan






    {{-- ========================= --}}
    {{-- Liste des membres --}}
    {{-- ========================= --}}


    <div class="bg-white shadow rounded-lg p-6">


        <h2 class="text-xl font-bold mb-4">

            Membres du projet

        </h2>



        <table class="w-full">


            <thead>

                <tr class="border-b">


                    <th class="text-left p-2">
                        Nom
                    </th>


                    <th class="text-left p-2">
                        Email
                    </th>


                    <th class="text-left p-2">
                        Rôle
                    </th>


                    @can('removeMember', $project)

                        <th class="text-left p-2">
                            Action
                        </th>

                    @endcan


                </tr>


            </thead>




            <tbody>


                @foreach($project->users as $user)


                    <tr class="border-b">


                        <td class="p-2">

                            {{ $user->name }}

                        </td>



                        <td class="p-2">

                            {{ $user->email }}

                        </td>



                        <td class="p-2">

                            {{ ucfirst($user->pivot->role) }}

                        </td>



                        @can('removeMember', $project)


                            <td class="p-2">


                                <form
                                    action="{{ route('projects.members.remove', [$project, $user]) }}"
                                    method="POST">


                                    @csrf
                                    @method('DELETE')



                                    <button
                                        class="bg-red-600 text-white px-3 py-1 rounded">


                                        Retirer


                                    </button>



                                </form>


                            </td>


                        @endcan



                    </tr>



                @endforeach



            </tbody>


        </table>


    </div>





    {{-- ========================= --}}
    {{-- Clôturer le projet --}}
    {{-- ========================= --}}


    @can('update', $project)


        @if($project->status !== 'cloture')


            <div class="mt-8">


                <form
                    action="{{ route('projects.close', $project) }}"
                    method="POST">


                    @csrf
                    @method('PATCH')



                    <button
                        type="submit"
                        class="bg-red-600 text-white px-5 py-2 rounded">


                        Clôturer le projet


                    </button>



                </form>


            </div>


        @endif


    @endcan






    {{-- Retour --}}


    <div class="mt-8">


        <a
            href="{{ route('projects.index') }}"
            class="bg-gray-600 text-white px-5 py-2 rounded">


            Retour


        </a>


    </div>



</div>

</x-app-layout>
