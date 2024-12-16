<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <div class="container mx-auto mt-10">
        <!-- Display a header for all examples -->
        <h2 class="text-2xl font-bold mb-6 text-center">
            All Data from Examples Table
        </h2>

        @if (session('success'))
            <div class="bg-green-500 text-white p-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Display all example cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($examples as $example)
                <div class="bg-white p-4 px-40 rounded-md shadow-md">
                    <!-- Category and Subcategory below the image -->
                    <p class="text-gray-700 font-semibold">Category : {{ $example->subcategory->category->category_name }}</p>
                    <p class="text-gray-500">Subcategory : {{ $example->subcategory->subcategory_name }}</p>

                    <!-- Image -->
                    <img src="{{ asset('storage/' . $example->image) }}" alt="{{ $example->name }}" class="w-45 h-48 object-cover rounded-md mb-4 cursor-pointer" data-modal-target="#example-modal-{{ $example->id }}">

                    <!-- Example Name and Description -->
                    <h3 class="text-lg font-bold mt-2">{{ $example->name }}</h3>
                    <p class="text-gray-600">{{ Str::limit($example->description, 100) }}</p>

                    <!-- Modal (Popup) for Example Data -->
                    <div id="example-modal-{{ $example->id }}" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white p-6 rounded-md max-w-lg w-full">
                            <h3 class="text-xl font-bold mb-4">{{ $example->name }}</h3>
                            <img src="{{ asset('storage/' . $example->image) }}" alt="{{ $example->name }}" class="w-full h-64 object-cover mb-4">
                            <p class="text-gray-700">{{ $example->description }}</p>
                            <button class="mt-4 text-white bg-red-500 px-4 py-2 rounded-md" onclick="closeModal({{ $example->id }})">Close</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // Function to open modal
        document.querySelectorAll('.cursor-pointer').forEach(function (image) {
            image.addEventListener('click', function () {
                const modalId = this.getAttribute('data-modal-target');
                document.querySelector(modalId).classList.remove('hidden');
            });
        });

        // Function to close modal
        function closeModal(exampleId) {
            const modal = document.getElementById('example-modal-' + exampleId);
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>
