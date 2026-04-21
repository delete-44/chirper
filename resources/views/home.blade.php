<x-layout>
  <x-slot:title>
    Welcome
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold">Welcome to Chirper!</h1>
    @foreach ($chirps as $chirp)
      <div class="card bg-base-100 shadow mt-4">
        <div class="card-body">
          <div>
            <div class="font-semibold">{{ $chirp['author'] }}</div>
            <div class="mt-1">{{ $chirp['message'] }}</div>
            <div class="text-sm text-gray-500 mt-2">{{ $chirp['time'] }}</div>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</x-layout>
