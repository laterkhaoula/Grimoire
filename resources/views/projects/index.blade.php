<x-app-layout>

<div class="max-w-7xl mx-auto py-8">

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-3xl font-bold">
            📚 Liste des projets
        </h1>

        @can('create', App\Models\Project::class)
            <a href="{{ route('projects.create') }}"
               class="bg-indigo-600 text-white px-5 py-2 rounded-lg">
                + Nouveau projet
            </a>
        @endcan

    </div>

    @if(session('success'))

        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>

    @endif

    <table class="w-full bg-white rounded shadow">

        <thead class="bg-gray-100">

            <tr>

                <th class="p-3">Titre</th>

                <th>Description</th>

                <th>Status</th>

                <th>Avancement</th>

                <th>Actions</th>

            </tr>

        </thead>

        <tbody>

        @forelse($projects as $project)

            <tr class="border-b">

                <td class="p-3">
                    {{ $project->title }}
                </td>

                <td>
                    {{ $project->description }}
                </td>

                <td>
                    {{ $project->status }}
                </td>

                <td>
                    {{ $project->avancement }} %
                </td>

                <td class="space-x-2">

                    <a
                        href="{{ route('projects.show', $project) }}"
                        class="text-blue-600">
                        Voir
                    </a>

                    @can('update', $project)
                        <a
                            href="{{ route('projects.edit', $project) }}"
                            class="text-green-600">
                            Modifier
                        </a>
                    @endcan

                    @can('delete', $project)
                        <form
                            action="{{ route('projects.destroy', $project) }}"
                            method="POST"
                            class="inline">

                            @csrf
                            @method('DELETE')

                            <button
                                class="text-red-600">

                                Archiver

                            </button>

                        </form>
                    @endcan

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="5" class="text-center p-6">

                    Aucun projet.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

</x-app-layout>