<div class="card shadow-lg border-0 rounded-4">
    <!-- Header -->
    <div class="card-header alert alert-secondary d-flex justify-content-between align-items-center" role="button"
        data-bs-toggle="collapse" href="#filter-body">
        <h6 class="mb-0">
            <i class="bi bi-filter-circle-fill me-1 text-info"></i> Filter
        </h6>
        <i class="bi bi-chevron-down text-dark"></i>
    </div>

    <!-- Body -->
    <div class="card-body collapse hide" id="filter-body">
        <div class="row g-3 mb-3">
            <!-- Category Select -->
            @if (request()->segment(1) === 'expenses')
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label for="categories" class="fw-semibold">
                        <i class="bi bi-list-ul me-1 text-secondary"></i> Categories:
                    </label>
                    <select id="categories" class="form-select form-select-md shadow-sm rounded-3">
                        <option selected value="0">All</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="payment_method" class="fw-semibold">
                    <i class="bi bi-credit-card me-1 text-secondary"></i> Payment Method:
                </label>
                <select id="payment_method" class="form-select form-select-md shadow-sm rounded-3">
                    <option value="all" selected>All</option>
                    <option value="online">Online</option>
                    <option value="cash">Cash</option>
                </select>
            </div>

            <!-- Quick Date Filter -->
            <div class="col-lg-4 col-md-6 col-sm-12">
                <label for="quick-date" class="fw-semibold">
                    <i class="bi bi-calendar-check me-1 text-secondary"></i> Quick Date:
                </label>
                <select id="quick-date" class="form-select form-select-md shadow-sm rounded-3">
                    <option value="month" selected>This Month</option>
                    <option value="week">This Week</option>
                    <option value="today">Today</option>
                    <option value="yesterday">Yesterday</option>
                    <option value="custom_date">Custom Date</option>
                </select>
            </div>

            <div id="custom-date-filter" class="d-none row mt-3">
                <!-- Start Date -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label for="start-date" class="fw-semibold">
                        <i class="bi bi-calendar-date me-1 text-secondary"></i> Start Date:
                    </label>
                    <input type="date" id="start-date" class="form-control shadow-sm rounded-3"
                        value="{{ now()->format('Y-m-d') }}">
                </div>

                <!-- End Date -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <label for="end-date" class="fw-semibold">
                        <i class="bi bi-calendar-date-fill me-1 text-secondary"></i> End Date:
                    </label>
                    <input type="date" id="end-date" class="form-control shadow-sm rounded-3"
                        value="{{ now()->format('Y-m-d') }}">
                </div>
            </div>

        </div>
        <div class="row">
            <!-- Apply Button -->
            <div class="col-lg-4 col-md-6 col-sm-6 d-grid">
                <button class="btn btn-info text-white btn-round shadow-sm" id="apply-filter-btn">
                    <i class="bi bi-check2-circle me-1"></i> Apply Filter
                </button>
            </div>

            <!-- Reset Button -->
            <div class="col-lg-4 col-md-6 col-sm-6 d-grid">
                <button class="btn btn-danger text-white btn-round shadow-sm" id="reset-filter-btn">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset Filter
                </button>
            </div>
        </div>
    </div>
</div>
