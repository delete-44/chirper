<x-layout>
  <x-slot:title>
    Login
  </x-slot:title>

  <div class="max-w-2xl mx-auto">
    <h1 class="text-3xl font-bold">Login</h1>

    <form method="POST" action="/login">
      @csrf

      <!-- Email -->
      <div class="form-control mt-6 flex flex-col">
        <label class="text-sm text-gray-600" for="email">Email</label>
        <input type="email" name="email" placeholder="mail@example.com" value="{{ old('email') }}"
          class="input input-bordered @error('email') border-red-600 @enderror" required autofocus />

        @error('email')
          <div class="label">
            <span class="label-text-alt text-red-600">{{ $message }}</span>
          </div>
        @enderror
      </div>

      <!-- Password -->
      <div class="form-control mt-6 flex flex-col">
        <label class="text-sm text-gray-600" for="password">Password</label>
        <input type="password" name="password" placeholder="••••••••"
          class="input input-bordered @error('password') border-red-600 @enderror" required />

        @error('password')
          <div class="label">
            <span class="label-text-alt text-red-600">{{ $message }}</span>
          </div>
        @enderror
      </div>

      <!-- Remember Me -->
      <div class="form-control mt-4">
        <label class="label cursor-pointer justify-start">
          <input type="checkbox" name="remember">
          <span class="ml-2 text-sm text-gray-600">Remember me</span>
        </label>
      </div>

      <!-- Submit Button -->
      <div class="mt-8">
        <button type="submit" class="btn btn-primary btn-sm">
          Login
        </button>
      </div>
    </form>

    <div class="divider">OR</div>
    <p class="text-center text-sm">
      Don't have an account?
      <a href="{{ route('register') }}" class="link link-primary">Register now</a>
    </p>
  </div>
</x-layout>
