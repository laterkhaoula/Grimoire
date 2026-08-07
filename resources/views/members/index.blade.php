<x-app-layout>

    <div class="max-w-7xl mx-auto py-8">

        <h1 class="text-3xl font-bold mb-6">
            Gestion des membres
        </h1>

        <table class="w-full border">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">Nom</th>
                    <th class="p-3 text-left">Email</th>
                </tr>
            </thead>

            <tbody>
                @forelse($members as $member)
                    <tr class="border-t">
                        <td class="p-3">{{ $member->name }}</td>
                        <td class="p-3">{{ $member->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="p-3 text-center">
                            Aucun membre trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

</x-app-layout>