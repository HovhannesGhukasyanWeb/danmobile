<div style="width: 100%">
    <nav class="bg-orange-800" style="width: 100%;">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items justify-around">
                <div>
                    <a class="text-white" href="{{ route('admin.dashboard') }}">
                        <h1 class="text-3xl font-bold">DanMobile</h1>
                    </a>
                </div>

                <div>
                    <ul class="items-center w-auto">
                        <li>
                            <a class="text-sm text-gray-300 hover:text-white px-4 py-2 flex items-center gap-2"
                                href="{{ route('admin.logout') }}">
                                Logout <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>