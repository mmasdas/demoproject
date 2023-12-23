<div>

    <div wire:poll.3s>
        @forelse ($messages as $message)
        <div class="m-8 p-3 bg-teal-600 rounded-lg">
            <p>
                {{ $message->title }}
            </p>
        </div>
        @empty
        <p>No articles</p>
        @endforelse
    </div>




    <div class="absolute bottom-0 mb-8 p-8 bg-blue-300 w-full">
        <form wire:submit='save' method="post">
            <button type="submit"
                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 mb-3">
                <svg class="w-3 h-3 text-white me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor" viewBox="0 0 20 16">
                    <path
                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                    <path
                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                </svg>
                Send
            </button>
            @error('title')
            <span class="mt-2 text-sm text-red-600">{{ $message }}</span>
            @enderror
            <input type="text" wire:model='title'
                class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                placeholder="write you want to message, and select top button...">
        </form>
    </div>
</div>