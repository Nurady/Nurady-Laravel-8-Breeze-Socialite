<x-app-layout>
    <x-container>
        <div class="grid grid-cols-3 gap-5 mb-3">
            @foreach($users as $user)
                <div class="mb-2 items-center border border-gray-300 rounded-md p-2">
                    <div class="flex items-center mb-2">
                        <div class="flex-shrink-0 mr-3">
                            <img class="rounded-full h-12 w-12" src="{{ $user->avatars() }}" alt="{{ $user->name }}">
                        </div>
                        <div>
                            <a href="{{ route('profile', $user->name) }}" class="font-semibold">
                                {{ $user->name }}
                            </a>
                            <div class="text-sm text-gray-600">{{ $user->pivot ? $user->pivot->created_at->diffForHumans() : ''}}</div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <form action="{{ route('following.store', $user) }}" method="post">
                            @csrf
                            <div class="mr-3">
                                <x-button>
                                    @if(Auth::user()->follows()->where('following_user_id', $user->id)->first())
                                        UnFollow
                                    @else
                                        Follow
                                    @endif
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>  
        {{ $users->links('vendor.pagination.tailwind') }}
    </x-container>
</x-app-layout>