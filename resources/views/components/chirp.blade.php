@props(['chirp'])

<div class="card bg-base-100 shadow mt-4">
  <div class="card-body">
    <div class="flex space-x-3">
      @if($chirp->user)
        <div class="avatar">
          <div class="size-10 rounded-full">
            <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
              alt="{{ $chirp->user->name }}'s avatar" class="rounded-full" />
          </div>
        </div>
      @else
        <div class="avatar placeholder">
          <div class="size-10 rounded-full">
            <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth"
              alt="Anonymous User" class="rounded-full" />
          </div>
        </div>
      @endif

      <div class="w-full">
        <div class="flex items-center justify-between gap-2 w-full">
          <div class="flex items-center gap-2">
            <span class="text-sm font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
            <span class="text-gray-600">&middot;</span>
            <small class="text-xs text-gray-600">{{ $chirp->created_at->diffForHumans() }}</small>
            @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
              <span class="text-gray-600">&middot;</span>
              <small class="text-cs text-gray-600 italic">edited</small>
            @endif
          </div>

          @can('update', $chirp)
            <div class="flex gap-2">
              <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-ghost btn-xs">
                Edit
              </a>

              <form method="POST" action="/chirps/{{ $chirp->id }}">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure you want to delete this chirp?')"
                  class="btn btn-ghost btn-xs text-red-600">
                  Delete
                </button>
              </form>
            </div>
          @endcan
        </div>

        <p class="text-gray-900">
          {{ $chirp->message }}
        </p>
      </div>
    </div>
  </div>
</div>
