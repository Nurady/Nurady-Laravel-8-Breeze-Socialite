<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl">
            Update Password Anda
        </h1>
    </x-slot>
    <div class="mb-5 alert" id="alert">
        @if (session('success'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Horeeyyy!</strong>
                <span class="block sm:inline">{{ session('success') }}.</span>
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" >
                        <title>Close</title>
                        <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" id="close" onclick="myFunction()"/>
                    </svg>
                </span>
            </div>
        @endif
    </div>
    <x-container>
        <div class="flex justify-center">
            <div class="w-full lg:w-1/2 border-light-blue-500 border-opacity-75 border rounded-md p-10">
                <form action="{{ route('password.edit') }}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-5">
                        <x-label for="current_password">Password Sekarang</x-label>
                        <x-input 
                            type="password" 
                            name="current_password" 
                            id="current_password" 
                            class="mt-1 w-full"/>
                        @error('current_password')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <x-label for="password">Password Baru</x-label>
                        <x-input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="mt-1 w-full"/>
                        @error('password')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <x-label for="password_confirmation">Password Konfirmasi</x-label>
                        <x-input 
                            type="password" 
                            name="password_confirmation" 
                            id="password_confirmation" 
                            class="mt-1 w-full"/>
                        @error('password_confirmation')
                            <div class="text-red-600 text-sm">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <x-button>Ubah Password</x-button>
                    </div>
                </form>
            </div>
        </div>
    </x-container>
    <script>
        function myFunction() {
          var x = document.getElementById("close");
          var y = document.getElementById("alert");
          y.style.display='none';
        }
    </script>
</x-app-layout>