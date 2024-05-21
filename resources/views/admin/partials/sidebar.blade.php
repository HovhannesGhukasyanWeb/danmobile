<div class="w-60 bg-orange-800 p-5 h-full sticky top-0">
    <ul class="space-y-2">
        @foreach(config('sidebar', []) as $item)
            <li>
                <a href="{{ route($item['route'])}}"
                    class="text-white text-md p-2 flex items-center gap-2 w-full sidebar-item @if(request()->route()->getName() == $item['route']) active @endif">
                    <span>
                        <i class="{{$item["icon"]}}"></i>
                    </span>
                    {{$item["title"]}}
                </a>
            </li>
        @endforeach
    </ul>
</div>