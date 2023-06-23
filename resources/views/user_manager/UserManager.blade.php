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

    <div class="flex justify-center h-screen bg-slate-500 pb-40 overflow-auto">
        <div class="w-100%">
            <div class="p-4 pt-40 w-100%">
                <p class="text-center text-white text-xl underline-offset-8 underline">User Manager</p>
                <div class="mt-10">
                    <a href="/api/new/user" class="bg-blue-500 hover:bg-blue-600 p-10 pt-2 pb-2 text-white">Add User</a>
                </div>
                @unless ($users->isEmpty())
                    <table class="bg-white border mt-10 w-100%">
                        <thead class="border border-black text-center">
                            <tr>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">First Name</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Middle Name</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Last Name</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Username</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Email</th>
                                <th class="border border-slate-500 p-3 pt-1 pb-1 text-md">Action</th>
                            </tr>
                        </thead>
                        <tbody class="border border-black text-center">
                            @foreach ($users as $user)
                            <tr class="border border-black">
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $user->first_name }}</td>
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $user->middle_name }}</td>
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $user->last_name }}</td>
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $user->username }}</td>
                                <td class="border border-slate-500 bg-slate-200 p-2 text-sm"> {{ $user->email }}</td>
                                <td class="p-2">
                                    
                                    <form action="{{ route('users.delete', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-700 text-white p-2 pt-1 pb-1 hover:bg-red-800">Delete</button>
                                    </form>
    
                                    <button onclick="window.location.href='{{ route('user.show', ['user' => $user->id]) }}'" class="bg-slate-700 text-white p-2 pt-1 pb-1 hover:bg-slate-800">Edit</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                <p class="text-red-500 text-xl ml-2 mt-4">No Users Available.</p>
                @endunless
    
                
            </div>
        </div>
    </div>
</body>
</html>