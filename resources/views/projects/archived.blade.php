<x-app-layout>

    <div class="max-w-7xl mx-auto py-8">

        <h1 class="text-2xl font-bold mb-6">
            Projets archivés
        </h1>

        @forelse($projects as $project)

            <div class="border rounded-lg p-4 mb-4 flex justify-between">

                <div>
                    <h2 class="font-bold">{{ $project->title }}</h2>
                    <p>{{ $project->description }}</p>
                </div>

                <form method="POST"
                      action="{{ route('projects.restore', $project->id) }}">
                    @csrf
                    @method('PATCH')

                    <button class="bg-green-600 text-white px-4 py-2 rounded">
                        Restaurer
                    </button>
                </form>

            </div>

        @empty

            <p>Aucun projet archivé.</p>

        @endforelse

    </div>

</x-app-layout>