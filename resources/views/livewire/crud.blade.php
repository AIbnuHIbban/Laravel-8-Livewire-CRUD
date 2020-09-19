<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('CRUD') }}
        </h2>
    </x-slot>

    @livewire('crud-post')

    <div class="max-w-2xl p-6 mx-auto bg-white">
        <br />
        @if ($datas->count())
            <table class="table w-full mb-5" cellpadding="5">
                <thead class="text-white bg-indigo-800">
                    <th>Title</th>
                    <th>Actions</th>
                </thead>
                <tbody class="text-center">
                    @foreach ($datas as $item)
                        <tr>
                            <td>{{ $item->title }}</td>
                            <td>
                                <button wire:click="selectItem({{ $item->id }}, 'update')" class="px-3 py-1 text-white bg-green-600 rounded">Update</button>
                                <button wire:click="delete({{$item->id}})" class="px-3 py-1 text-white bg-red-600 rounded">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $datas->links()}}
        @endif
    </div>
</div>
