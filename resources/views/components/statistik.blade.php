<div>
    <div class="flex">
        <a href="{{ route('profile', $user->name) }}" class="px-10 py-5 font-semibold text-center border-r border-l">
            <div class="uppercase text-xs">Status</div>
            <div class="text-2xl">{{ $user->statuses->count() }}</div>
        </a>
        <a href="{{ route('profile.following', $user->name) }}" class="px-10 py-5 font-semibold text-center border-r border-l">
            <div class="uppercase text-xs">Following</div>
            <div class="text-2xl">{{ $user->follows->count() }}</div>
        </a>
        <a href="{{ route('profile.followers', $user->name) }}" class="px-10 py-5 font-semibold text-center border-r border-l">
            <div class="uppercase text-xs">Follower</div>
            <div class="text-2xl">{{ $user->followers->count() }}</div>
        </a>
    </div>
    <div class="flex mt-7">
        {{-- @if(Auth::id() !== $user->id) --}}
        @if(Auth::user()->isNot($user))
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
                {{-- <div>
                    <x-button>UnFollow</x-button>
                </div> --}}
            </form>
        @else
            <a href="{{ route('profile.edit') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                Edit Profile
            </a>
        @endif
    </div>
</div>