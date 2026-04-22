<x-layout>
  <x-slot:title>
    Welcome
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold">Welcome to Chirper!</h1>
    <form method="POST" action="/chirps">
      @csrf
      <div class="form-control mt-4 w-full">
        <label class="text-gray-600 text-sm" for="message">Chirp at us</label>
        <textarea name="message" placeholder="Whats on your mind?"
          class="textarea textarea-bordered w-full resize-none mt-1 @error('message') textarea-error @enderror" rows="4"
          maxlength="255" required>{{ old('message') }}</textarea>

        @error('message')
          <div class="label">
            <span class="label-text-alt text-red-600">{{ $message }}</span>
          </div>
        @enderror
      </div>

      <div class="mt-2 flex items-center justify-end">
        <button type="submit" class="btn btn-primary btn-sm">
          Chirp
        </button>
      </div>
    </form>

    <x-feed :chirps="$chirps" :depth="0"></x-feed>
  </div>
</x-layout>
