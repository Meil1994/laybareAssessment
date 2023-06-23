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
    <div class="pb-10 bg-slate-500 overflow-auto">
        <div class="flex justify-center">
            <div class="pb-10 pt-40 ">
                <div class="m-10">
                    <a href="/api/product/manager" class="bg-red-500 p-4 pt-1 pb-1 mb-10 text-white hover:bg-red-600">Back</a>
                </div>
                <label class="ml-10 text-xl text-white">Add New Product</label>
                <form action="{{ route('api.product.store') }}" method="POST" enctype="multipart/form-data" class="mt-4 ring-4 ring-white p-4 m-10 570:w-500">
                    @csrf
                    @method('POST')

                    <div class="ml-auto mr-auto" style="width: 150px; height:160px;">
                        <label for="logo" class="cursor-pointer">
                            
                            <div>
                                <img style="width: 150px; height:150px;" class="mt-1 ml-auto mr-auto rounded-full ring-4 object-cover" id="previewImage" src="{{ asset('img/product.webp') }}"   alt=""/>
                                <input class="hidden" id="logo" name="product_image" type="file" accept="image/*" onchange="previewLogo(event)">
                            </div>
        
                            <div style="margin-top:-40px;">
                                <i class="fa-solid fa-camera p-2 rounded-full bg-blue-400 text-white" style="margin-left:110px;"></i>
                            </div>
                        </label>
                    </div>

                    <div class="mb-4">
                        <label class="text-white ml-1">Product Name</label>
                        <input 
                            name="product_name"
                            class="p-2 w-100% rounded-lg"
                        />
                    </div>
    
                    <div class="mb-4">
                        <label class="text-white ml-1">Product SKU</label>
                        <input 
                            name="product_sku"
                            class="p-2 w-100% rounded-lg mb-4"
                        />
                    </div>
    
                    <div class="mb-4">
                        <label class="text-white ml-1">Category</label>
                        <select name="product_category" class="p-2 w-100% rounded-lg mb-4" required>
                            <option value="">Select a category</option> <!-- Add a default option -->
                            @foreach($categories as $category)
                                <option value="{{ $category->category_name }}" {{ $category->category_name == old('product_category') ? 'selected' : '' }}>
                                    {{ $category->category_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
    
                    <div>
                        <label class="text-white ml-1">Product Description</label>
                        <input 
                            name="product_description"
                            class="p-2 w-100% rounded-lg mb-4"
                        />
                    </div>
    
    
                   <div class="flex justify-center">
                       <button type="submit" class="bg-blue-500 p-10 pt-2 pb-2 mt-10 text-white hover:bg-blue-600">Update</button>
                   </div>
                       
                </form>
            </div>
        </div>
    </div>

    <script>
        function previewLogo(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('previewImage').src = e.target.result;
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

</body>
</html>