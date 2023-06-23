<form class="inline" method="POST">
    @csrf
    <div id="popup-modal" tabindex="-1" class="fixed z-50 hidden bg-slate-700/50 p-4 pt-28 overflow-x-hidden overflow-y-auto w-100 md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md  ml-auto mr-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <h3 class="mb-10 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to logout?</h3>
                    <button data-modal-hide="popup-modal" type="submit" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                        Yes, I'm sure
                    </button>
                    <button data-modal-hide="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</form> 

<nav class="bg-white">

    <div class="grid grid-cols-2 596:grid-cols-6 p-10 pt-2 pb-2 ">
        <div class="col-span-1">
            <img src="{{ asset('img/logo.png') }}" class="h-20 w-20 rounded-full object-cover"/>
        </div>

        <div class="596:col-span-5">
            <ul class="flex justify-end 596:justify-between items-center h-100">
                
                <div class="navigationBar border-b-2 border-slate-500 hover:text-amber-500 hover:border-slate-600">
                    <li class="cursor-pointer text-lg hidden 832:block"><a href="/api/dashboard">Dashboard</a></li>
                </div>

                <div class="navigationBar border-b-2 border-slate-500 hover:text-amber-500 hover:border-slate-600">
                    <li class="cursor-pointer text-lg hidden 832:block"><a href="/api/user/manager">User Manager</a></li>
                </div>

                <div class="navigationBar border-b-2 border-slate-500 hover:text-amber-500 hover:border-slate-600">
                    <li class="cursor-pointer text-lg hidden 832:block"><a href="/api/category/manager">Category Manager</a></li>
                </div>

                <div class="navigationBar border-b-2 border-slate-500 hover:text-amber-500 hover:border-slate-600">
                    <li class="cursor-pointer text-lg hidden 832:block"><a href="/api/product/manager">Product Manager</a></li>
                </div>

                <li class="832:hidden ring-2 ring-slate-500 p-1 rounded-md"><button><i class="fa-sharp fa-solid fa-bars"></i></button></li>
            
            </ul>

        </div>
    </div>
</nav>

<script src="/modal.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
