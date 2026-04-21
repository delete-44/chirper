<x-layout>
  <x-slot:title>
    Register
  </x-slot:title>

  <h1 class="text-3xl font-bold">Create Account</h1>

  <form method="POST" action="/register">
    @csrf

    <!-- Name -->
    <label class="floating-label mt-6" for="name">
      <input type="text" name="name" placeholder="John Doe" value="{{ old('name') }}"
        class="input input-bordered @error('name') input-error @enderror" required>
      <span>Name</span>
    </label>

    @error('name')
      <div class="label">
        <span class="label-text-alt text-error">{{ $message }}</span>
      </div>
    @enderror

    <!-- Email -->
    <label class="floating-label mt-6">
      <input type="email" name="email" placeholder="[mail@example.com](<mailto:mail@example.com>)"
        value="{{ old('email') }}" class="input input-bordered @error('email') input-error @enderror" required>
      <span>Email</span>
    </label>

    @error('email')
      <div class="label">
        <span class="label-text-alt text-error">{{ $message }}</span>
      </div>
    @enderror

    <!-- Password -->
    <label class="floating-label mt-6">
      <input type="password" name="password" placeholder="••••••••"
        class="input input-bordered @error('password') input-error @enderror" required>
      <span>Password</span>
    </label>

    @error('password')
      <div class="label">
        <span class="label-text-alt text-error">{{ $message }}</span>
      </div>
    @enderror

    <!-- Password Confirmation -->
    <label class="floating-label mt-6">
      <input type="password" name="password_confirmation" placeholder="••••••••" class="input input-bordered" required>
      <span>Confirm Password</span>
    </label>

    <!-- Submit Button -->
    <div class="form-control mt-8">
      <button type="submit" class="btn btn-primary btn-sm w-full">
        Register
      </button>
    </div>
  </form>

  <div class="divider">OR</div>
  <p class="text-center text-sm">
    Already have an account?
    <a href="/login" class="link link-primary">Sign in</a>
  </p>
</x-layout>
