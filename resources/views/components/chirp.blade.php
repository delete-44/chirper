@props(['chirp'])

<div class="grow pt-5 relative" x-data="{ showReplyForm: false }">
  <div class=" absolute h-full border-l border-gray-300 border-dashed left-4"></div>

  <div class="flex space-x-3">
    @if($chirp->user)
      <div class="avatar">
        <div class="size-8 rounded-full">
          <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}"
            alt="{{ $chirp->user->name }}'s avatar" class="rounded-full" />
        </div>
      </div>
    @else
      <div class="avatar placeholder">
        <div class="size-8 rounded-full">
          <img src="https://avatars.laravel.cloud/f61123d5-0b27-434c-a4ae-c653c7fc9ed6?vibe=stealth" alt="Anonymous User"
            class="rounded-full" />
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
            <small class="text-xs text-gray-600 italic">edited</small>
          @endif
        </div>

        @can('update', $chirp)
          <div class="flex gap-1">
            <a href="/chirps/{{ $chirp->id }}/edit" class="btn btn-xs">
              Edit
            </a>

            <form method="POST" action="/chirps/{{ $chirp->id }}" class="contents">
              @csrf
              @method('DELETE')
              <button type="submit" onclick="return confirm('Are you sure you want to delete this chirp?')"
                class="btn btn-xs text-red-600">
                Delete
              </button>
            </form>
          </div>
        @endcan
      </div>

      <p class="text-gray-900">
        {{ $chirp->message }}
      </p>

      <button @click="showReplyForm = !showReplyForm" x-show="!showReplyForm"
        class="btn btn-xs border border-gray-300 mt-4">
        Reply
      </button>

      <div x-show="showReplyForm" class="mt-2">
        <form method="POST" action="/chirps">
          @csrf
          <input type="hidden" name="chirp_id" value="{{ $chirp->id }}">

          <label class="text-gray-600 text-sm" for="message">Write your reply</label>
          <textarea name="message" placeholder="Whats on your mind?"
            class="textarea textarea-bordered w-full resize-none mt-1 @error('message') textarea-error @enderror"
            rows="4" maxlength="255" required>{{ old('message') }}</textarea>

          <div class="flex gap-2 mt-2">
            <button type="submit" class="btn btn-primary btn-sm">
              Reply
            </button>

            <button type="button" @click="showReplyForm = false" class="btn btn-sm">
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
