<x-app-layout>
    <div class="mb-5 hide" id="hide">
        @if (session('success'))
            <div class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-teal-500 bg-gradient-to-r from-green-400 to-blue-500">
                <span class="text-xl inline-block mr-5 align-middle">
                <i class="fas fa-bell"></i>
                </span>
                <span class="inline-block align-middle mr-8">
                <b class="capitalize">Horeyyy!</b> Berhasil Ubah Profile!
                </span>
                <button class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none" onclick="closeAlert(event)">
                    <span>×</span>
                </button>
            </div>
        @endif
    </div>
    <x-container>
        <div class="flex">
            <div class="flex-shrink-0 mr-3">
                <img class="rounded-full h-12 w-12" src="{{ $user->avatars() }}" alt="{{ $user->name }}">
            </div>
            <div>
                <h1 class="font-semibold mb-3">{{ $user->name }}</h1>
                <div class="text-sm text-gray-500">
                    Bergabung {{ $user->created_at->diffForHumans() }}
                </div>
            </div>
        </div>
    </x-container>
    <div class="-mt-20">
        <x-container>
            <div class="flex">
                <x-statistik :user="$user"/>
                {{-- <a href="{{ route('profile', $user) }}" class="px-10 py-5 font-semibold text-center border-r border-l">
                    <div class="uppercase text-xs">Status</div>
                    <div class="text-2xl">{{ $user->statuses->count() }}</div>
                </a>
                <a href="{{ route('profile.following', $user) }}" class="px-10 py-5 font-semibold text-center border-r border-l">
                    <div class="uppercase text-xs">Following</div>
                    <div class="text-2xl">{{ $user->follows->count() }}</div>
                </a>
                <a href="{{ route('profile.followers', $user) }}" class="px-10 py-5 font-semibold text-center border-r border-l">
                    <div class="uppercase text-xs">Follower</div>
                    <div class="text-2xl">{{ $user->followers->count() }}</div>
                </a> --}}
            </div>
        </x-container>
    </div>
    <div class="-mt-20">
        <x-container>
            <div class="grid grid-cols-2">
                <div>
                    @foreach($statuses as $key => $status)
                        <div class="flex mb-8">
                            <div class="flex-shrink-0 mr-3">
                                <img class="rounded-full h-12 w-12" src="{{ $status->user->avatars() }}" alt="{{ $status->user->name }}">
                            </div>
                            <div>
                                <div class="font-semibold">{{ $status->user->name }}</div>
                                <div class="leading-relaxed">{{ $status->body }}</div>
                                <div class="text-sm text-gray-600">{{ Carbon\Carbon::parse($status->created_at)->translatedFormat("l, d F Y") }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </x-container>
    </div>
    <script>
        // function myFunction() {
        //   var x = document.getElementById("close");
        //   var y = document.getElementById("alert");
        //   y.style.display='none';
        // }
        function closeAlert(event){
            let element = event.target;
            while(element.nodeName !== "BUTTON"){
            element = element.parentNode;
            }
            element.parentNode.parentNode.removeChild(element.parentNode);
        }
    </script>
</x-app-layout>