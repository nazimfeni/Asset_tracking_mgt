<x-app-layout>
    <!-- resources/views/assets/index.blade.php -->

    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                <h2 class="text-2xl font-bold mb-8">Asset List</h2>

                @if ($assets->count() > 0)
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asset Type ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Purchase Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Purchase Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Condition</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Location</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Used By</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th> <!-- New column for actions -->
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($assets as $asset)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->asset_type_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->description }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->purchase_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->purchase_price }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->condition }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->location }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->used_by }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $asset->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
    <a href="{{ route('assets.edit', $asset->id) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
    <form action="{{ route('assets.destroy', $asset->id) }}" method="POST" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
    </form>
</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No assets found.</p>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
