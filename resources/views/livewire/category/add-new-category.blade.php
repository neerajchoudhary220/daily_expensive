<div>
    <div class="modal fade" id="category-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="mb-0 modal-title"><i class="bi bi-folder-plus me-2"></i>Add New Category</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <form
                            @if (!empty($items_category)) wire:submit.prevent="update" @else wire:submit.prevent="save" @endif>
                            <!-- Category Name -->
                            <div class="mb-3">
                                <label for="categoryName" class="form-label fw-bold required">Category Name</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-primary text-white">
                                        <i class="bi bi-tag-fill"></i>
                                    </span>
                                    <input type="text" class="form-control" id="categoryName" wire:model='name'
                                        placeholder="Enter category name">
                                </div>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Category Description -->
                            <div class="mb-3">
                                <label for="categoryDescription" class="form-label fw-bold">Description
                                    (Optional)</label>
                                <textarea class="form-control" id="categoryDescription" rows="3" wire:model="description"
                                    placeholder="Enter short description..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger text-white"
                                        data-bs-dismiss="modal">Close</button>

                                    @if (!empty($items_category))
                                        <button type="submit" class="bi bi-arrow-repeat me-1 btn btn-info text-white"
                                            wire:click='update'> Update</button>
                                    @else
                                        <button type="submit" class="bi bi-plus-circle me-1 btn btn-info text-white"
                                            wire:click='save'>Save</button>
                                    @endif
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

@script
    <script>
        $(document).ready(function() {

            $wire.on('show-add-new-category-modal', (e) => {
                $("#category-modal").modal('show');
            });


        });
    </script>
@endscript
