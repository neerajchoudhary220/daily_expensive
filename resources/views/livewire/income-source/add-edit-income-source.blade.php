<div>
    <div class="modal fade" id="transaction-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="mb-0 modal-title"><i class="bi bi-box-seam-fill me-2"></i>
                        @if (!empty($incomes))
                            Update Transaction
                        @else
                            Add New Trasaction
                        @endif
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form
                            @if (!empty($incomes)) wire:submit.prevent="update" @else wire:submit.prevent="save" @endif>
                            <!-- Amount -->
                            <div class="mb-3">
                                <label for="amount" class="form-label fw-bold">
                                    <i class="bi bi-currency-rupee me-1 text-success"></i> Amount
                                </label>
                                <input type="number" class="form-control form-control-lg" wire:model="amount"
                                    id="amount" placeholder="Enter amount" min="1" max="10000"
                                    step="0.01">
                                @error('amount')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Category -->
                            @if ($source_categories)
                                <div class="mb-3">
                                    <label for="category" class="form-label fw-bold">
                                        <i class="bi bi-tags me-1 text-success"></i> Source
                                    </label>
                                    <select class="form-select" id="category" wire:model="source_category">

                                        @foreach ($source_categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach


                                    </select>
                                    @error('source_category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <!-- Date -->
                            <div class="mb-3">
                                <label for="date" class="form-label fw-bold">
                                    <i class="bi bi-calendar-date me-1 text-success"></i> Date
                                </label>
                                <input type="date" class="form-control" id="date" wire:model="date">
                                @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Notes -->
                            <div class="mb-3">
                                <label for="notes" class="form-label fw-bold">
                                    <i class="bi bi-pencil-square me-1 text-success"></i> Notes
                                </label>
                                <textarea class="form-control" id="notes" rows="3" placeholder="Optional notes..." wire:model="description"></textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Submit -->
                            <div class="d-grid">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger text-white"
                                        data-bs-dismiss="modal">Close</button>

                                    @if (!empty($incomes))
                                        <button type="submit" class="bi bi-arrow-repeat me-1 btn btn-info text-white">
                                            Update</button>
                                    @else
                                        <button type="submit"
                                            class="bi bi-plus-circle me-1 btn btn-info text-white">Save</button>
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
            $wire.on('show-income-transaction-modal', (e) => {
                $("#transaction-modal").modal('show');
            });

        })
    </script>
@endscript
