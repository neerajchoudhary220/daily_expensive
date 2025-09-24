<div>
    <div class="card">
        <div class="card-header alert alert-info">
            <h6>Expense Category (Total:₹ {{ $total_expense }})</h6>
        </div>
        <div class="card-body">
            <div class="row g-3">
                <!-- Food -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#ff9a9e,#ff6a88);">
                        <div class="card-body text-center">
                            <i class="bi bi-cup-hot-fill expense-icon"></i>
                            <div class="expense-category">Food & Groceries</div>
                            <div class="expense-amount">₹ {{ $total_food_and_groceries }}</div>
                        </div>
                    </div>
                </div>

                <!-- Transport -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#56ab2f,#a8e063);">
                        <div class="card-body text-center">
                            <i class="bi bi-bus-front-fill expense-icon"></i>
                            <div class="expense-category">Transport</div>
                            <div class="expense-amount">₹ {{ $total_transport }}</div>
                        </div>
                    </div>
                </div>

                <!-- Utilities -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#36d1dc,#5b86e5);">
                        <div class="card-body text-center">
                            <i class="bi bi-lightning-charge-fill expense-icon"></i>
                            <div class="expense-category">Utilities</div>
                            <div class="expense-amount">₹ {{ $total_utilities }}</div>

                        </div>
                    </div>
                </div>

                <!-- Health -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#ff758c,#ff7eb3);">
                        <div class="card-body text-center">
                            <i class="bi bi-heart-pulse-fill expense-icon"></i>
                            <div class="expense-category">Healthcare</div>
                            <div class="expense-amount">₹ {{ $total_healthcare }}</div>

                        </div>
                    </div>
                </div>

                <!-- Education -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#f7971e,#ffd200);">
                        <div class="card-body text-center">
                            <i class="bi bi-mortarboard-fill expense-icon"></i>
                            <div class="expense-category">Education</div>
                            <div class="expense-amount">₹ {{ $total_education }}</div>

                        </div>
                    </div>
                </div>

                <!-- Entertainment -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#4b6cb7,#182848);">
                        <div class="card-body text-center">
                            <i class="bi bi-film expense-icon"></i>
                            <div class="expense-category">Entertainment</div>
                            <div class="expense-amount">₹ {{ $total_entertainment }}</div>

                        </div>
                    </div>
                </div>

                <!-- Shopping -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#00c6ff,#0072ff);">
                        <div class="card-body text-center">
                            <i class="bi bi-cart-fill expense-icon"></i>
                            <div class="expense-category">Shopping</div>
                            <div class="expense-amount">₹ {{ $total_shopping }}</div>

                        </div>
                    </div>
                </div>

                <!-- Other -->
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="card expense-card p-2 h-100 d-flex justify-content-center align-items-center"
                        style="background: linear-gradient(135deg,#11998e,#38ef7d);">
                        <div class="card-body text-center">
                            <i class="bi bi-cash-coin expense-icon"></i>
                            <div class="expense-category">Other</div>
                            <div class="expense-amount">₹ {{ $total_other }}</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
