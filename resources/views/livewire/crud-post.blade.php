<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('CRUD') }}
        </h2>
    </x-slot>
    <div class="container mx-auto">
        <div class="w-full max-w-2xl p-6 mx-auto bg-white inputs mt-9">
            <h2 class="text-2xl text-gray-900">CRUD Data</h2>
            <div class="pt-4 mt-6 border-t border-gray-400">
                <div class='flex flex-wrap mb-6 -mx-3'>
                    <div class='w-full px-3 mb-6 md:w-full'>
                        <label class='block mb-2 text-xs font-bold tracking-wide text-gray-700 uppercase'
                            for='grid-text-1'>Title</label>
                        <input
                            class='block w-full px-4 py-3 leading-tight text-gray-700 bg-white border border-gray-400 rounded-md shadow-inner appearance-none focus:outline-none focus:border-gray-500'
                            id='grid-text-1' type='text' placeholder='Enter title' required wire:model='title' autofocus>
                        @if ($errors->has('title'))
                        <p style="color: red;">{{$errors->first('title')}}</p>
                        @endif
                    </div>
                    <button wire:click='save'
                        class="block px-10 py-3 mx-auto text-xs text-white uppercase bg-indigo-800 rounded shadow hover:bg-indigo-700 focus:shadow-outline focus:outline-none">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
