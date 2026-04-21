<x-layout>
  <x-slot:title>
    Register
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold">Create Account</h1>

    <form method="POST" action="/register">
      @csrf

      <!-- Name -->
      <div class="form-control mt-6 flex flex-col">
        <label class="text-sm text-gray-500" for="name">Name</label>
        <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}"
          class="input input-bordered @error('name') border-red-600 @enderror" required />

        @error('name')
          <div class="label">
            <span class="label-text-alt text-red-600">{{ $message }}</span>
          </div>
        @enderror
      </div>

      <!-- Email -->
      <div class="form-control mt-6 flex flex-col">
        <label class="text-sm text-gray-500" for="email">Email</label>
        <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}"
          class="input input-bordered @error('email') border-red-600 @enderror" required />

        @error('email')
          <div class="label">
            <span class="label-text-alt text-red-600">{{ $message }}</span>
          </div>
        @enderror
      </div>

      <!-- Password -->
      <div class="form-control mt-6 flex flex-col">
        <label class="text-sm text-gray-500" for="password">Password</label>
        <input type="password" name="password" placeholder="••••••••"
          class="input input-bordered @error('password') border-red-600 @enderror" required />

        @error('password')
          <div class="label">
            <span class="label-text-alt text-red-600">{{ $message }}</span>
          </div>
        @enderror
      </div>

      <!-- Password Confirmation -->
      <div class="form-control mt-6 flex flex-col">
        <label class="text-sm text-gray-500" for="password_confirmation">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="••••••••"
          class="input input-bordered @error('password') border-red-600 @enderror" required />
      </div>

      <!-- Submit Button -->
      <div class="mt-8">
        <button type="submit" class="btn btn-primary btn-sm">
          Register
        </button>
      </div>
    </form>

    <div class="divider">OR</div>
    <p class="text-center text-sm">
      Already have an account?
      <a href="/login" class="link link-primary">Sign in</a>
    </p>
  </div>
</x-layout>
