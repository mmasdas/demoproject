<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 space-y-1 dark:text-gray-100">

                    <input type="text" wire:model.live="search"
                        class="block mb-2 w-full border-gray-300 rounded-md shadow-sm">

                    {{ $search }}
                    <hr>
                    @foreach($posts as $post)
                    <h2 class="text-lg">{{ $post->title }}</h2>
                    @endforeach


                    <hr>

                    <div class="space-y-1">
                        @foreach($this->comments as $comment)
                        <p>{{ $comment->body }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>