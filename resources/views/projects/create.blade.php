<x-app-layout>

    <div class="max-w-3xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            ➕ Nouveau Projet
        </h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.store') }}" method="POST" class="bg-white shadow rounded-lg p-6">

            @csrf

            <!-- Titre -->
            <div class="mb-4">
                <label for="title" class="block font-semibold mb-2">
                    Titre
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border rounded-lg p-2"
                    required>
            </div>

            <!-- Description -->
            <div class="mb-4">
                <label for="description" class="block font-semibold mb-2">
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    class="w-full border rounded-lg p-2"
                    required>{{ old('description') }}</textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <label for="status" class="block font-semibold mb-2">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                    class="w-full border rounded-lg p-2"
                    required>

                    <option value="en_cours"
                        {{ old('status') == 'en_cours' ? 'selected' : '' }}>
                        En cours
                    </option>

                    <option value="termine"
                        {{ old('status') == 'termine' ? 'selected' : '' }}>
                        Terminé
                    </option>

                    <option value="en_attente"
                        {{ old('status') == 'en_attente' ? 'selected' : '' }}>
                        En attente
                    </option>

                </select>
            </div>

            <!-- Avancement -->
            <div class="mb-6">
                <label for="avancement" class="block font-semibold mb-2">
                    Avancement (%)
                </label>

                <input
                    type="number"
                    id="avancement"
                    name="avancement"
                    min="0"
                    max="100"
                    value="{{ old('avancement', 0) }}"
                    class="w-full border rounded-lg p-2"
                    required>
            </div>

            <!-- Boutons -->
            <div class="flex gap-3">

                <button
                    type="submit"
                    class="bg-indigo-600 text-white px-5 py-2 rounded-lg hover:bg-indigo-700">

                    Enregistrer

                </button>

                <a
                    href="{{ route('projects.index') }}"
                    class="bg-gray-500 text-white px-5 py-2 rounded-lg hover:bg-gray-600">

                    Annuler

                </a>

            </div>

        </form>

    </div>

</x-app-layout>