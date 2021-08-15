<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Timeline') }}
        </h2>
    </x-slot> --}}

    <x-container>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-8">
                <form action="{{ route('statuses.store') }}" method="post" class="mb-8">
                    @csrf
                    <div class="border rounded-xl p-5">
                        <div class="flex mb-8">
                            <div class="flex-shrink-0 mr-3">
                                <img class="rounded-full h-12 w-12" src="{{ Auth::user()->avatars() }}" alt="{{ Auth::user()->name }}">
                            </div>
                            <div class="w-full">
                                <div class="font-semibold">{{ Auth::user()->name }}</div>
                                <div class="my-2">
                                    <textarea 
                                        name="body" 
                                        id="body" 
                                        placeholder="Apa yang anda pikirkan."
                                        class="form-textarea w-full border-gray-300 rounded-xl resize-none focus:border-blue-300 focus:ring focus:ring-blue-200 transition duration-200 placeholder-gray-400 @error('body') border-red-500 @enderror"
                                    ></textarea>
                                    @error('body')
                                        <div class="text-red-600">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-right">
                                    <x-button>Buat Status</x-button>
                                </div>
                            </div>
                        </div>
                </form>
                </div>
                @foreach($statuses as $key => $status)
                    <div class="flex mb-8">
                        <div class="flex-shrink-0 mr-3">
                            <img class="rounded-full h-12 w-12" src="{{ $status->user->avatars() }}" alt="{{ $status->user->name }}">
                        </div>
                        <div>
                            <div class="font-semibold">{{ $status->user->name }}</div>
                            <div class="leading-relaxed">{{ $status->body }}</div>
                            <div class="text-sm text-gray-600">{{ Carbon\Carbon::parse($status->created_at)->translatedFormat("l, d F Y") }}</div>
                            {{-- <div>{{ $status->created_at->format("d F,Y") }}</div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-span-4">
                <div class="border p-5 rounded-xl">
                    <h1 class="font-semibold mb-5">Teman yang anda Follows</h1>
                    @forelse(Auth::user()->follows as $user)
                        <div class="flex mb-8 items-center">
                            <div class="flex-shrink-0 mr-3">
                                <img class="rounded-full h-12 w-12" src="{{ $user->avatars() }}" alt="{{ $status->user->name }}">
                            </div>
                            <div>
                                <div class="font-semibold">{{ $user->name }}</div>
                                <div class="text-sm text-gray-600">{{ $user->pivot->created_at->diffForHumans() }}</div>
                            </div>
                        </div>
                    @empty
                        <h3 class="font-semibold mb-5">Belum ada</h3>
                    @endforelse
                </div>
            </div>
        </div>
    </x-container>
</x-app-layout>