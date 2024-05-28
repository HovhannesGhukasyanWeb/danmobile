<div class="p-5 flex justify-between items-center bg-orange-800">
    <div>
        <a href="{{ route('home') }}" class="text-white text-2xl font-bold">Danmobile</a>
    </div>
    <div class="flex items-center gap-4">
        <a href="{{ route('home') }}" class="text-white">Home</a>
        <a href="{{ route('user.products.index') }}" class="text-white">Products</a>

        @if(!auth()->guard('user')->check())
            <a href="/login" class="text-white flex items-center" data-modal="modal-bg">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                </svg>
                Login
            </a>
            <a href="/register" class="text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Create an account
            </a>
        @else
            <a href="/me" class="text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                Me
            </a>
            <a href="/logout" class="text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                Log out
            </a>
        @endif
    </div>

    <div id="modal-bg" class="fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center hidden">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h2 class="text-xl font-bold mb-4">Modal Title</h2>
            <p class="text-gray-700 mb-4">Modal Content goes here...</p>
            <button class="block bg-gray-200 text-gray-700 px-4 py-2 rounded-lg close-modal" data-modal="modal-bg">Close
                Modal</button>
        </div>
    </div>

</div>