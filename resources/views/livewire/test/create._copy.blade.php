<div class="modal fade show" id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel" style="display: block; background-color: rgba(0, 0, 0, .5);" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLiveLabel">Add Record</h5>
                <button wire:click="$toggle('createModal')"  type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            {{-- {{ dd($trainingRecord) }} --}}
            <form wire:submit.prevent="store" action="POST">
                <div class="modal-body">
                    
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Title</label>
                            <input wire:model="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Author</label>
                            <input wire:model="author" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Subject</label>
                            <select wire:model="category" class="form-select" aria-label="Default select example">
                                <option value="" selected>Select a Category</option>
                                <option value="opening">Opening</option>
                                <option value="middlegame">Middlegame</option>
                                <option value="endgame">Endgame</option>
                            </select>
                        </div>
                
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Content</label>
                            <textarea wire:model="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button wire:click="$toggle('createModal')" type="submit" class="btn btn-primary">Submit</button>
                    <button wire:click="$toggle('createModal')" type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>