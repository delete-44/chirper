<x-layout>
  <x-slot:title>
    Welcome
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold">Welcome to Chirper!</h1>
    @forelse ($chirps as $chirp)
      <x-chirp :chirp="$chirp" />
    @empty
    <p class="text-gray-400">No chirps yet. Be the first to chirp!</p>
    @endif
  </div>
</x-layout>
