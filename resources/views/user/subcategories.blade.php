<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<x-app-layout>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Subcategories of {{ $category->category_name }}</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 ">
            @foreach ($subcategories as $subcategory)
                <div class="col">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('storage/' . $subcategory->subcategory_image) }}" class="card-img-top w-44 ml-32" alt="{{ $subcategory->subcategory_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $subcategory->subcategory_name }}</h5>
                            <a href="{{ route('user.examples', $subcategory->id) }}" class="btn btn-primary">View Examples</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
