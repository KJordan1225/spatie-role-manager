@extends($layout)

@section('content')
<div class="container mx-auto max-w-lg p-4 bg-white rounded shadow">
    <h2 class="text-2xl font-semibold mb-4">Edit Event</h2>

    @if ($errors->any())
        <div class="mb-4 text-red-600">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="#" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-medium">Event Name</label>
            <input type="text" name="name" id="name" class="w-full border rounded px-3 py-2"
                value="{{ old('name', $event->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="date" class="block font-medium">Start Date and Time</label>
            <input type="date" name="date" id="date" class="w-full border rounded px-3 py-2"
                value="{{ old('date', $event->date->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-4">
            <label for="date" class="block font-medium">End Date and Time</label>
            <input type="date" name="date" id="date" class="w-full border rounded px-3 py-2"
                value="{{ old('date', $event->date->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-4">
            <label for="location" class="block font-medium">Location</label>
            <input type="text" name="location" id="location" class="w-full border rounded px-3 py-2"
                value="{{ old('location', $event->location) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-medium">Description</label>
            <textarea name="description" id="description" class="w-full border rounded px-3 py-2"
                rows="4" required>{{ old('description', $event->description) }}</textarea>
        </div>

        <div class="flex justify-between items-center">
            <a href="#" class="text-blue-500 hover:underline">← Back to List</a>

            <div class="flex space-x-2">
                <button type="button" onclick="openModal()"
                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                    Delete
                </button>

                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">
    <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
        <h3 class="text-xl font-semibold mb-4">Confirm Deletion</h3>
        <p class="mb-6">Are you sure you want to delete this event?</p>
        <div class="flex justify-end space-x-2">
            <button onclick="closeModal()" class="px-4 py-2 rounded bg-gray-300 hover:bg-gray-400">Cancel</button>
            <form action="#" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 rounded bg-red-500 text-white hover:bg-red-600">
                    Confirm Delete
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function openModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
        document.getElementById('deleteModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.remove('flex');
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
@endsection
