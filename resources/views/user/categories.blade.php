<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<x-app-layout>
    <div class="container mt-5">
        <h2 class="text-center mb-4">WELCOME TO USER'S DASHBOARD!!!</h2>
        <h3 class="text-center mb-5">Categories</h3>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($categories as $category)
                <div class="col">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('storage/' . $category->category_image) }}" class="card-img-top" alt="{{ $category->category_name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $category->category_name }}</h5>
                            <p class="card-text">Discover more about this category and explore its subcategories.</p>
                            <a href="{{ route('user.subcategories', $category->id) }}" class="btn btn-primary">View Subcategories</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
