<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6 text-center">Subcategories</h2>
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        @foreach ($categories as $category)
            <div class="mb-8">
                <!-- Main Heading for Category -->
                <h3 class="text-xl font-bold mb-4">{{ $category->category_name }}</h3>

                <!-- Subcategories Table -->
                <table class="min-w-full bg-white border rounded-md">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Subcategory ID</th>
                            <th class="py-2 px-4 border-b">Subcategory Name</th>
                            <th class="py-2 px-4 border-b">Subcategory Image</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category->subcategories as $subcategory)
                            <tr>
                                <td class="py-2 px-4 border-b">{{ $subcategory->id }}</td>
                                <td class="py-2 px-4 border-b">{{ $subcategory->subcategory_name }}</td>
                                <td class="py-2 px-4 border-b">
                                    <img src="{{ asset('storage/' . $subcategory->subcategory_image) }}" alt="{{ $subcategory->subcategory_name }}" class="h-16 w-16 object-cover">
                                </td>
                                <td class="py-2 px-4 border-b">
                                    <!-- Open Popup for Adding Example -->
                                    <button
                                        class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition"
                                        onclick="openExampleForm({{ $subcategory->id }})"
                                    >
                                        Add Example
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endforeach
    </div>

    <!-- Popup Form for Adding Examples -->
    <div id="exampleForm" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-xl font-bold mb-4 text-gray-700 text-center">Add Example</h2>
            <form action="{{ route('examples.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" id="subcategory_id" name="subcategory_id">

                <!-- Name -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-600">Name</label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter name"
                        required
                    />
                </div>

                <!-- Image -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-600">Image</label>
                    <input
                        type="file"
                        id="image"
                        name="image"
                        class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        accept="image/*"
                        required
                    />
                </div>

                <!-- Description -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-600">Description</label>
                    <textarea
                        id="description"
                        name="description"
                        class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter description"
                        required
                    ></textarea>
                </div>

                <!-- Submit Button -->
                <div>
                    <button
                        type="submit"
                        class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 transition"
                    >
                        Submit
                    </button>
                </div>
            </form>
            <button class="mt-4 w-full bg-red-500 text-white py-2 rounded-md hover:bg-red-600 transition" onclick="closeExampleForm()">Cancel</button>
        </div>
    </div>

    <!-- JavaScript for Popup -->
    <script>
        function openExampleForm(subcategoryId) {
            document.getElementById('exampleForm').classList.remove('hidden');
            document.getElementById('subcategory_id').value = subcategoryId;
        }

        function closeExampleForm() {
            document.getElementById('exampleForm').classList.add('hidden');
        }
    </script>
</x-app-layout>
