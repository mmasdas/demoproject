<div class="py-12">
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="overflow-hidden overflow-x-auto border-b border-gray-200 bg-white p-6">
                <form wire:submit.prevent="save">
                    <div>
                        <x-input-label for="name" value="Name" />
                        <x-text-input id="form.name" wire:model='form.name' type="text" class="block mt-1 w-full" />
                        @error('form.name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <x-primary-button>
                            Save
                        </x-primary-button>
                        <a href="{{ route('companies.index') }}"
                            class="px-4 py-2 font-bold text-white bg-gray-500 rounded" type="button">
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>