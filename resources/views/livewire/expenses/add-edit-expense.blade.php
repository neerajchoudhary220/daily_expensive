<div>
    <div class="modal fade" id="expense-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h4 class="mb-0 modal-title"><i class="bi bi-box-seam-fill me-2"></i>
                        @if (!empty($expense))
                            Update Expense
                        @else
                            Add New Expense
                        @endif
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form
                            @if (!empty($expense)) wire:submit.prevent="update" @else wire:submit.prevent="save" @endif>
                            <div class="row">

                                <!-- Category -->
                                @if ($expense_categories)
                                    <div class="mb-3 col-xl-12 col-lg-12 col-md-12">
                                        <label for="category" class="form-label fw-bold required"><i
                                                class="bi bi-list-ul me-2 text-primary"></i>Category</label>

                                        <select class="form-select rounded-3" id="category"
                                            wire:model="expense_category_id">
                                            @foreach ($expense_categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('expense_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif
                                {{-- Expense Date --}}
                                <div class="mb-3 col-xl-6 col-lg-6 col-md-12">
                                    <label for="expense_date" class="form-label fw-bold required"><i
                                            class="bi bi-calendar-date  me-2 text-primary"></i> Expense Date
                                    </label>
                                    <input class="form-control rounded-3" type="date" id="expense_date"
                                        wire:model="expense_date">
                                    @error('expense_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                {{-- Name --}}
                                <div class="mb-3 col-xl-6 col-lg-6 col-md-12">
                                    <label for="name" class="form-label fw-bold required"><i
                                            class="bi bi-box-seam-fill me-2 text-primary"></i>Name</label>
                                    <input class="form-control rounded-3" id="name" wire:model="name"
                                        placeholder="Enter The Expense">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                {{-- Payment Mode --}}
                                <div class="mb-3 col-xl-6 col-lg-6 col-md-12">
                                    <label for="payment_mode" class="form-label fw-bold">
                                        <i class="bi bi-credit-card me-2"></i> Payment Mode
                                    </label>
                                    <select class="form-select rounded-3" id="payment_mode" wire:model="payment_mode">
                                        <option value="">-- Select Payment Mode --</option>
                                        <option value="cash">Cash</option>
                                        <option value="online">Online</option>
                                    </select>
                                    @error('payment_mode')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>


                                {{-- Amount --}}
                                <div class="mb-3 col-xl-6 col-lg-6 col-md-12">
                                    <label for="amount" class="form-label fw-bold required"><i
                                            class="bi bi-cash-coin me-2 text-primary"></i> Amount</label>
                                    <input class="form-control rounded-3" id="amount" wire:model="amount"
                                        placeholder="Enter The Amount" type="number" min="1" max="10000">
                                    @error('amount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <!-- Notes -->
                                <div class="mb-3">
                                    <label for="notes" class="form-label fw-bold">
                                        <i class="bi bi-pencil-square me-2"></i> Notes
                                    </label>
                                    <textarea class="form-control rounded-3" wire:model="description" id="notes" rows="3"
                                        placeholder="Enter details..."></textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>


                            <!-- Description -->

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger text-white"
                                        data-bs-dismiss="modal">Close</button>

                                    @if (!empty($expense))
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

            @script
                <script>
                    $(document).ready(function() {
                        $wire.on('show-expense-modal', (e) => {
                            $("#expense-modal").modal('show');
                        });

                    })
                </script>
            @endscript
