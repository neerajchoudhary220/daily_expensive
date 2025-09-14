<div>
    <div class="modal fade" id="item-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="mb-0 modal-title"><i class="bi bi-box-seam-fill me-2"></i>
                        @if (!empty($item))
                            Update Item
                        @else
                            Add New Item
                        @endif
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form
                            @if (!empty($item)) wire:submit.prevent="update" @else wire:submit.prevent="save" @endif>
                            <!-- Name -->
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold required"><i
                                        class="bi bi-tag me-2 text-primary"></i>Name</label>
                                <input type="text" class="form-control form-control-lg rounded-3" id="name"
                                    placeholder="Enter item name" wire:model='name'>

                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="mb-3">
                                <label for="category" class="form-label fw-bold required"><i
                                        class="bi bi-list-ul me-2 text-primary"></i>Category</label>
                                @if ($item_categories)
                                    <select class="form-select form-select-lg rounded-3" id="category"
                                        wire:model="items_category_id">
                                        @foreach ($item_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                @endif
                                @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Description -->
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bold optional"><i
                                        class="bi bi-card-text me-2 text-primary"></i>Description</label>
                                <textarea class="form-control rounded-3" id="description" rows="4" wire:model='description'
                                    placeholder="Enter item description"></textarea>

                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger text-white"
                                        data-bs-dismiss="modal">Close</button>

                                    @if (!empty($item))
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

            @script
                <script>
                    $(document).ready(function() {
                        $wire.on('show-item-modal', (e) => {
                            $("#item-modal").modal('show');
                        });


                    })
                </script>
            @endscript
