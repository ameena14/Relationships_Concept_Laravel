<script src="https://cdn.tailwindcss.com"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Examples in {{ $subcategory->subcategory_name }}</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($examples as $example)
                <div class="col">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('storage/' . $example->image) }}" class="card-img-top w-44 ml-32" alt="{{ $example->name }}">
                        <div class="card-body">
                            <h5 class="card-title">Name : {{ $example->name }}</h5>
                            <p class="card-text">Description : {{ $example->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
