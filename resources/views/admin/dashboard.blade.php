<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h4>Admin Dashboard Page</h4>

                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('admin.logout')"
                                onclick="event.preventDefault();
                                this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <div class="bg-gray-100 flex items-center justify-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-sm">
          <h2 class="text-xl font-bold mb-4 text-gray-700 text-center">Add Category</h2>
          <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
        
            <!-- Category Name -->
            <div>
              <label for="category_name" class="block text-sm font-medium text-gray-600">Category Name</label>
              <input
                type="text"
                id="category_name"
                name="category_name"
                class="w-full mt-1 px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="Enter category name"
                required
              />
            </div>
      
            <!-- Category Image -->
            <div>
              <label for="category_image" class="block text-sm font-medium text-gray-600">Category Image</label>
              <input
                type="file"
                id="category_image"
                name="category_image"
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
                Add Category
              </button>
            </div>
          </form>
        </div>
    </div>

    

</x-app-layout>