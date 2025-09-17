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
                                @if ($item_categories)
                                    <div class="mb-3 col-6">
                                        <label for="category" class="form-label fw-bold required"><i
                                                class="bi bi-list-ul me-2 text-primary"></i>Category</label>

                                        <select class="form-select form-select-lg rounded-3" id="category"
                                            wire:model="items_category_id" wire:change="getItem($event.target.value)">
                                            @foreach ($item_categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                                {{-- Item --}}
                                @if ($items)
                                    <div class="mb-3 col-6">
                                        <label for="item" class="form-label fw-bold required"><i
                                                class="bi bi-box-seam-fill me-2 text-primary"></i>Item</label>
                                        <select class="form-select form-select-lg rounded-3" id="item"
                                            wire:model="item_id">
                                            @foreach ($items as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('item')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                @endif

                            </div>
                            @if ($items)
                                <div class="row">
                                    {{-- Unit/Size --}}
                                    <div class="mb-3 col-3">
                                        <label for="unit" class="form-label fw-bold required"><i
                                                class="bi bi-basket2-fill me-2 text-primary"></i>Unit/Size</label>
                                        <select class="form-select form-select-lg rounded-3" id="unit"
                                            wire:model="unit_id">
                                            @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('unit')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    {{-- Qty --}}
                                    <div class="mb-3 col-3">
                                        <label for="qty" class="form-label fw-bold required"><i
                                                class="bi bi-basket me-2 text-primary"></i>Qty</label>
                                        <input class="form-control form-control-lg" id="qty" wire:model="qty">
                                        @error('qty')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Price --}}
                                    <div class="mb-3 col-3">
                                        <label for="price" class="form-label fw-bold required"><i
                                                class="bi bi-currency-rupee me-2 text-primary"></i>Price</label>
                                        <input class="form-control form-control-lg" id="price" wire:model="price">
                                        @error('price')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- Date --}}
                                    <div class="mb-3 col-3">
                                        <label for="date" class="form-label fw-bold required"><i
                                                class="bi bi-calendar me-2 text-primary"></i>Date</label>
                                        <input class="form-control form-control-lg" type="date" id="date"
                                            wire:model="date">
                                        @error('date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label class="form-label fw-bold" for="payment_mode">Payment Mode</label>
                                        <div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_mode"
                                                    id="online" wire:model="payment_mode">
                                                <label class="form-check-label" for="online">Online</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="payment_mode"
                                                    id="offline" wire:model="payment_mode">
                                                <label class="form-check-label" for="offline">Offline</label>
                                            </div>

                                        </div>
                                    </div>



                                </div>
                            @endif





                            <!-- Description -->

                            <!-- Submit Button -->
                            <div class="d-grid">
                                <div class="col-12 text-end">
                                    <button type="button" class="btn btn-danger text-white"
                                        data-bs-dismiss="modal">Close</button>

                                    @if (!empty($expense))
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
                        $wire.on('show-expense-modal', (e) => {
                            $("#expense-modal").modal('show');
                        });

                    })
                </script>
            @endscript
