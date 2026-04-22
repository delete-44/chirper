@props(['chirps', 'depth'])

@forelse ($chirps as $chirp)
  <section class="flex flex-nowrap w-full items-stretch gap-6">
    @for ($i = 0; $i < $depth; $i++)
      <div></div>
    @endfor

    <x-chirp :chirp="$chirp" />
  </section>

  @if ($chirp->hasReplies())
    <x-feed :chirps="$chirp->replies" :depth="$depth + 1"></x-feed>
  @endif
@empty
  <p class="text-gray-400">No chirps yet. Be the first to chirp!</p>
@endforelse
