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
                    <a href="/api/user/manager" class="bg-red-500 p-4 pt-1 pb-1 mb-10 text-white hover:bg-red-600">Back</a>
                </div>
                <label class="ml-10 text-xl text-white">Add New User</label>
                <form action="{{ route('users.store') }}" method="POST" class="mt-4 ring-4 ring-white p-4 m-10 570:w-500">
                    @csrf
                    @method('POST')
                    <div class="mb-4">
                        <label class="text-white ml-1">Username</label>
                        <input 
                            name="username"
                            class="p-2 w-100% rounded-lg"
                        />
                    </div>
    
                    <div class="mb-4">
                        <label class="text-white ml-1">First Name</label>
                        <input 
                            name="first_name"
                            class="p-2 w-100% rounded-lg mb-4"
                        />
                    </div>
    
                    <div class="mb-4">
                        <label class="text-white ml-1">Middle Name</label>
                        <input 
                            name="middle_name"
                            class="p-2 w-100% rounded-lg mb-4"
                        />
                    </div>
    
                    <div>
                        <label class="text-white ml-1">Last Name</label>
                        <input 
                            name="last_name"
                            class="p-2 w-100% rounded-lg mb-4"
                        />
                    </div>
    
                   <div>
                        <label class="text-white ml-1">Email</label>
                        <input 
                            name="email"
                            class="p-2 w-100% rounded-lg mb-4"
                        />
                   </div>
    
                   <div>
                        <label class="text-white ml-1">Password</label>
                        <input 
                            name="password"
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
</body>
</html>