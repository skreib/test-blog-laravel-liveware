<div>
    <div class="container px-4">
        <h2 class="text-4xl">{{ $post->title }}</h2>
        <div class="mt-8">
            {!! $post->body !!}
        </div>

        <hr>
        <livewire:comments-section :post="$post" />
    </div>
</div>


