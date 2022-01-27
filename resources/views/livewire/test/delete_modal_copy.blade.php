<div class="modal fade show" id="exampleModalLive" style="display: block; background-color: rgba(0, 0, 0, .5);" tabindex="-1" aria-labelledby="exampleModalLiveLabel"  aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLiveLabel">Delete Record</h5>
          <button wire:click="closeDeleteModal" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Are you sure to detele this record?</p>
        </div>
        <div class="modal-footer">
          <button wire:click="delete({{ $deleteIDrecord }})" type="button" class="btn btn-danger">Yes</button>
          <button wire:click="closeDeleteModal" type="button" class="btn btn-dark" data-bs-dismiss="modal">No</button>
        </div>
      </div>
    </div>
</div>

{{-- {{ dd($deleteIDrecord) }} --}}