<div id="link-form" class="{{ $isOpen ?? true ? 'modal modal-open' : 'modal'}}">
    <div class="modal-box">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Name</span>
                </label> 
                <input name="name" wire:model.defer="data.name" type="text" placeholder="name" 
                    class="input input-bordered @error('data.name') input-error @enderror" required>
                @error('data.name') 
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Link</span>
                </label>
                <input name="link"  wire:model.defer="data.link" type="url" placeholder="http://example.com" 
                    class="input input-bordered @error('data.link') input-error @enderror" required>
                @error('data.link') 
                <label class="label">
                    <span class="label-text-alt">{{ $message }}</span>
                </label>
                @enderror
            </div>
            <div class="flex flex-row justify-around space-x-4">
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text"></span>
                    </label>
                    <div wire:click="save()" type="submit" class="btn btn-primary">Save</div>
                </div>
                <div class="form-control w-full">
                    <label class="label">
                        <span class="label-text"></span>
                    </label>
                    <div wire:click="toggle()" class="btn btn-accent">Close</div>
                </div>
            </div>
    </div>
</div>