<div class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-90">
    <div class="w-1/2 bg-white rounded-lg">
        <form wire:submit.prevent="save" class="w-full">
            <div class="flex flex-col items-start p-4">
                <div class="flex items-center pb-4 mb-4 w-full border-b">
                    <div class="text-lg font-medium text-gray-900">Create Category</div>
                </div>
                <div class="mb-2 w-full">
                    <label class="block text-sm font-medium text-gray-700" for="form.name">
                        Name
                    </label>
                    <input wire:model="form.name" id="form.name"
                        class="py-2 pr-4 pl-2 mt-2 w-full text-sm rounded-lg border border-gray-400 sm:text-base focus:outline-none focus:border-blue-400" />
                    @error('form.name')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-2 w-full">
                    <label class="block text-sm font-medium text-gray-700" for="form.slug">
                        Slug
                    </label>
                    <input wire:model="form.slug" id="form.slug"
                        class="py-2 pr-4 pl-2 mt-2 w-full text-sm rounded-lg border border-gray-400 sm:text-base focus:outline-none focus:border-blue-400" />
                    @error('form.slug')
                    <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mt-4 ml-auto">
                    <button class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" type="submit">
                        Save
                    </button>
                    <a href="{{ route('categories.index') }}" class="px-4 py-2 font-bold text-white bg-gray-500 rounded"
                        type="button">
                        Close
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>