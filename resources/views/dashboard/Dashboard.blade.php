<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Store</title>
    @vite('resources/css/app.css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <script src="https://kit.fontawesome.com/12e77b0106.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Work Sans', sans-serif;
        }
    </style>
</head>
<body>
    <div style="position: fixed; top: 0; left: 0; right: 0;">
        @include('components.Nav')
    </div>
    <div class="pb-10 bg-slate-500 h-screen overflow-auto">
        <div class="mt-28 p-10">
            <p class="text-center text-white text-xl underline-offset-8 underline">Dashboard</p>

            <form class="mt-10 flex justify-center" action="{{ route('dashboard') }}" method="GET">
                <div class="p-4">
                    <label class="text-white ml-1" for="category">Category:</label>
                    <select class="w-100% p-2 rounded-lg" name="category" id="category">
                        <option value="">Show All</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->category_name }}" {{ $category->category_name == old('product_category') ? 'selected' : '' }}>
                                {{ $category->category_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class=" p-4">
                    <label class="text-white ml-1" for="sort">Sort by:</label>
                    <select class="w-100% p-2 rounded-lg" name="sort" id="sort">
                        <option value="asc">Ascending</option>
                        <option value="desc">Descending</option>
                    </select>
                </div>
                
                <div class="p-4">
                    <label for="search" class="text-white ml-1">Search:</label>
                    
                    <div class="flex justify-center items-center">
                        <input class="mr-4w-100% p-2 rounded-lg" type="text" name="search" id="search" value="{{ request('search') }}">
                        <button class="bg-blue-500 ml-4 rounded-lg text-white p-4 pt-2 pb-2" type="submit">Search</button>
                    </div>
                </div>
                
                
            </form>
            <div class="flex justify-center mt-10 w-100%">
                <div class="flex justify-between p-4 w-100%">
                    @unless ($products->isEmpty())
                        @foreach ($products as $product)
                            <button onclick="window.location.href='{{ route('single.show', ['product' => $product->id]) }}'" class="m-10 ring-4 ring-white p-2">
                                @if ($product->product_image)
                                    <div style="width: 200px; height: 200px;">
                                        <img style="width: 100%; height: 100%;" class="object-cover" src="{{ asset('storage/' . $product->product_image) }}"/>
                                    </div>
                                @else
                                    <div style="width: 100px; height: 100px;">
                                        <img style="width: 100%; height: 100%;" class="object-cover" src="{{ asset('img/product.webp') }}"/>
                                    </div>
                                @endif
                                <p class="text-center text-xl mt-2 text-white">{{ $product->product_name }}</p>
                            </button>
    
                        @endforeach
                    @else
                    <p class="text-red-500 text-xl ml-2 mt-4">No Products Found</p>
                    @endunless
                </div>
            </div>
            <div class="flex justify-center mt-4">
                <button class="ring-2 bg-blue-500">{{ $products->links() }}</button>
            </div>
        </div>
    </div>
</body>
</html>