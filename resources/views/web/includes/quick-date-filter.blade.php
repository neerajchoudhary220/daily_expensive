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