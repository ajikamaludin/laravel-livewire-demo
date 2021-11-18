<div id="link-delete" class="{{ $isOpen ?? true ? 'modal modal-open' : 'modal'}}">
    <div class="modal-box">
        <div class="text-center">
            <p class="text-2xl font-bold">Are sure to delete item?</p>
            <p>this action is cant revert</p>
        </div>
        <div class="modal-action">
                <div wire:click="delete()" type="submit" class="btn btn-error">Delete</div>
                <div wire:click="toggle()" class="btn btn-accent">Cancel</div>
            </div>
    </div>
</div>