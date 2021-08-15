<x-app-layout>
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
                {{-- <div class="px-10 py-5 font-semibold text-center border-r border-l">
                    <div class="uppercase text-xs">Status</div>
                    <div class="text-2xl">{{ $user->statuses->count() }}</div>
                </div>
                <div class="px-10 py-5 font-semibold text-center border-r border-l">
                    <div class="uppercase text-xs">Following</div>
                    <div class="text-2xl">{{ $user->follows->count() }}</div>
                </div>
                <div class="px-10 py-5 font-semibold text-center border-r border-l">
                    <div class="uppercase text-xs">Followers</div>
                    <div class="text-2xl">{{ $user->followers->count() }}</div>
                </div> --}}
            </div>
        </x-container>
    </div>
    @isset($following)
        <div class="-mt-20">
            <x-container>
                <h1 class="font-semibold mb-5">Teman Anda ({{ $following->count() }})</h1>
                <div class="grid grid-cols-2">
                    <div>
                        @forelse($following as $user)
                            <div class="flex mb-8 items-center">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="rounded-full h-12 w-12" src="{{ $user->avatars() }}" alt="{{ $user->name }}">
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $user->pivot->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @empty 
                            Belum ada teman yang anda follow
                        @endforelse
                    </div>
                </div>
            </x-container>
        </div>
    @endisset

    @isset($followers)
        <div class="-mt-20">
            <x-container>
                <h1 class="font-semibold mb-5">Followers Anda ({{ $followers->count() }})</h1>
                <div class="grid grid-cols-2">
                    <div>
                        @forelse($followers as $user)
                            <div class="flex mb-8 items-center">
                                <div class="flex-shrink-0 mr-3">
                                    <img class="rounded-full h-12 w-12" src="{{ $user->avatars() }}" alt="{{ $user->name }}">
                                </div>
                                <div>
                                    <div class="font-semibold">{{ $user->name }}</div>
                                    <div class="text-sm text-gray-600">{{ $user->pivot->created_at->diffForHumans() }}</div>
                                </div>
                            </div>
                        @empty 
                            Belum ada followers anda
                        @endforelse
                    </div>
                </div>
            </x-container>
        </div>
    @endisset
</x-app-layout>