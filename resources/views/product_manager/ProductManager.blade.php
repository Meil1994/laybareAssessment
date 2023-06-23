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
            <p class="text-center text-white text-xl underline-offset-8 underline">Product Manager</p>
                <div class="mt-10">
                    <a href="/api/new/product" class="bg-blue-500 hover:bg-blue-600 p-10 pt-2 pb-2 text-white">Add Product</a>
                </div>
            <div>
                @unless ($products->isEmpty())
                    <table class="bg-white border mt-10 w-100%">
                        <thead class="border border-black text-center">
                            <tr>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Product Name</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Product SKU</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Product Category</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Product Description</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Icon</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Action</th>
                            </tr>
                        </thead>
                        <tbody class="border border-black text-center">
                            @foreach ($products as $product)
                            <tr class="border border-black">
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $product->product_name }}</td>
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $product->product_sku }}</td>
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $product->product_category }}</td>
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $product->product_description }}</td>
                                
                                <td class="flex justify-center border border-slate-500 bg-slate-200 p-2 text-sm">
                                    @if ($product->product_image)
                                        <div class="ring-2" style="width: 100px; height: 100px;">
                                            <img style="width: 100%; height: 100%;" class="object-cover" src="{{ asset('storage/' . $product->product_image) }}"/>
                                        </div>
                                    @else
                                        <div class="ring-2" style="width: 100px; height: 100px;">
                                            <img style="width: 100%; height: 100%;" class="object-cover" src="{{ asset('img/product.webp') }}"/>
                                        </div>
                                    @endif
                                </td>

                                <td class="p-2">
                                    
                                    <form action="{{ route('product.delete', $product->id) }}"  method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-700 text-white p-2 pt-1 pb-1 hover:bg-red-800">Delete</button>
                                    </form>
                                    <button onclick="window.location.href='{{ route('product.show', ['product' => $product->id]) }}'"  class="bg-slate-700 text-white p-2 pt-1 pb-1 hover:bg-slate-800">Edit</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <p class="text-red-500 text-xl ml-2 mt-4">No Products Available.</p>
                @endunless
            </div>
        </div>
    </div>
</body>
</html>