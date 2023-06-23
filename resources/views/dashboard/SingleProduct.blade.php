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
    <div class="bg-slate-500 h-screen overflow-auto">
        
        <div class="pt-28 flex justify-center items-center">
            
            <div>
                <div class="mt-10 mb-10">
                    <a href="/api/dashboard" class="bg-red-500 p-4 pt-1 pb-1 mb-10 text-white hover:bg-red-600">Back</a>
                </div>

                


               <div class="ring-4 ring-white p-4 489:w-400">
                    <div>
                        @if ($product->product_image)
                            <div style="width: 100%; height: 200px;">
                                <img style="width: 100%; height: 100%;" class="object-cover" src="{{ asset('storage/' . $product->product_image) }}"/>
                            </div>
                        @else
                            <div style="width: 100%; height: 100px;">
                                <img style="width: 100%; height: 100%;" class="object-cover" src="{{ asset('img/product.webp') }}"/>
                            </div>
                        @endif
                    </div>
    
                        <div class="mb-4">
                            <label class="text-sm text-slate-300">Product Name</label>
                            <p class="pl-2 text-2xl text-white ring-2 ring-white">{{ $product->product_name }}</p>
                        </div>
        
                        <div class="mb-4">
                            <label class="text-sm text-slate-300">Product SKU</label>
                            <p class="pl-2 text-2xl text-white ring-2 ring-white">{{ $product->product_sku }}</p>
                        </div>

                        <div class="mb-4">
                            <label class="text-sm text-slate-300">Product Category</label>
                            <p class="pl-2 text-2xl text-white ring-2 ring-white">{{ $product->product_category }}</p>
                        </div>
        
                        <div class="mb-4">
                            <label class="text-sm text-slate-300">Product Category</label>
                            <p class="pl-2 text-2xl text-white ring-2 ring-white">{{ $product->product_description }}</p>
                        </div>
               </div>


                  
                
                       


            </div>
        </div>

    </div>


</body>
</html>