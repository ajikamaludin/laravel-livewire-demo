<div class="flex flex-col space-y-6 px-3">
    <div class="flex justify-between">
        <div class="flex space-x-4">
            <div wire:click="openFormModal()" class="btn btn-primary">Add New</div>
            <a href="#my-modal" class="btn btn-outline border-primary text-primary hover:bg-primary">Import</a>
        </div>
        <input type="text" class="input input-bordered" placeholder="search" wire:model.debounce.500ms="search">
    </div>
    <div class="">
        <table class="table w-full" wire:loading.class.delay="opacity-25">
            <thead>
                <tr>
                    <th wire:click="orderBy('name')" >
                        <div class="flex flex-row items-center justify-around">
                            Name 
                            @if($sortField == 'name') @if($sortDirection == 'asc') <x-icons.chevron-up/> @else <x-icons.chevron-down/> @endif @endif
                        </div>
                    </th> 
                    <th>Link</th> 
                    <th>Redirect</th> 
                    <th wire:click="orderBy('visit_count')">
                        <div class="flex flex-row items-center justify-around">
                            Visited
                            @if($sortField == 'visit_count') @if($sortDirection == 'asc') <x-icons.chevron-up/> @else <x-icons.chevron-down/> @endif @endif
                        </div>
                    </th> 
                    <th wire:click="orderBy('last_visited_at')">
                        <div class="flex flex-row items-center justify-around">
                            Last Visited At
                            @if($sortField == 'last_visited_at') @if($sortDirection == 'asc') <x-icons.chevron-up/> @else <x-icons.chevron-down/> @endif @endif
                        </div>
                    </th> 
                    <th></th>
                </tr>
            </thead> 
            <tbody>
                @foreach($shortlinks as $shortlink)
                <tr>
                    <td>{{ $shortlink->name }}</td> 
                    <td>{{ url($shortlink->code) }}</td> 
                    <td>{{ $shortlink->real_link }}</td> 
                    <td>{{ $shortlink->visit_count }}</td> 
                    <td>{{ $shortlink->last_visited_at }}</td> 
                    <td>
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" class="text-primary"><x-icons.vdot/></div> 
                            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52">
                                <li>
                                    <a href="#" wire:click="openFormModal('{{ $shortlink->id }}')">Edit</a>
                                </li> 
                                <li>
                                    <a href="#" wire:click="openDeleteModal('{{ $shortlink->id }}')">Delete</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
                @if($shortlinks->count() <= 0)
                <tr>
                    <td>No Data</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
    {{ $shortlinks->links('components.pagination') }}
</div>
