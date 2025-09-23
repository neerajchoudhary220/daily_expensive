<div>
    <div class="d-flex justify-content-between">
        <div class="rounded-3 text-start total-box mb-3 p-2 alert alert-danger">
            <small class="d-block mb-1">
                <i class="bi bi-bar-chart-line me-1"></i> Total <span>₹{{ $total_expense }}</span>
            </small>
        </div>
        <div class="rounded-3 text-start total-box mb-3 p-2 alert alert-warning ms-2">
            <small class="d-block mb-1">
                <i class="bi bi bi-calendar-check me-1"></i> Today <span>₹{{ $today_expense }}</span>
            </small>
        </div>
    </div>
</div>
