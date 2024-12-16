<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <div class="container mx-auto mt-10">
        <h2 class="text-2xl font-bold mb-6 text-center">Categories</h2>
        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <table class="min-w-full bg-white border rounded-md">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Category Name</th>
                    <th class="py-2 px-4 border-b">Category Image</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $category->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->category_name }}</td>
                        <td class="py-2 px-4 border-b">
                            <img src="{{ asset('storage/' . $category->category_image) }}" alt="{{ $category->category_name }}" class="h-16 w-16 object-cover">
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition"
                                onclick="openSubcategoryForm({{ $category->id }})"
                            >
                                Add Subcategories
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Popup Form -->
    <div id="subcategoryForm" class="hidden fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-xl font-bold mb-4 text-gray-700 text-center">Add Subcategory</h2>
            <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <input type="hidden" id="category_id" name="category_id">
                <!-- Subcategory Name -->
                <div>
                    <label for="subcategory_name" class="block text-sm font-medium text-gray-600">Subcategory Name</label>
                    <input
                        type="text"
                        id="subcategory_name"
                        name="subcategory_name"
                        class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Enter subcategory name"
                        required
                    />
                </div>

                <!-- Subcategory Image -->
                <div>
                    <label for="subcategory_image" class="block text-sm font-medium text-gray-600">Subcategory Image</label>
                    <input
                        type="file"
                        id="subcategory_image"
                        name="subcategory_image"
                        class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                        accept="image/*"
                        required
                    />
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
            <button class="mt-4 w-full bg-red-500 text-white py-2 rounded-md hover:bg-red-600 transition" onclick="closeSubcategoryForm()">Cancel</button>
        </div>
    </div>

    <script>
        function openSubcategoryForm(categoryId) {
            document.getElementById('subcategoryForm').classList.remove('hidden');
            document.getElementById('category_id').value = categoryId;
        }

        function closeSubcategoryForm() {
            document.getElementById('subcategoryForm').classList.add('hidden');
        }
    </script>
</x-app-layout>
