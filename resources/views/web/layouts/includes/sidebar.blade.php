  <div id="sidebar" class="bg-dark p-3">
      {{-- <h4 class="text-white mb-4">💸 ExpenseTracker</h4> --}}
      <ul class="nav flex-column">
          <li class="nav-item">
              <a href="{{ route('dashboard') }}" @class([
                  'nav-link d-flex align-items-center',
                  'active' => request()->is(['/']),
              ])>
                  <i class="bi bi-speedometer2 me-2"></i>
                  <span class="d-none d-md-inline">Dashboard</span>
              </a>
          </li>

          <li class="nav-item">
              <a href="{{ route('expenses') }}" @class([
                  'nav-link d-flex align-items-center',
                  'active' => request()->is(['expenses']),
              ])>
                  <i class="bi bi-bag-fill me-2"></i>
                  <span class="d-none d-md-inline">Expenses</span>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ route('income_transaction') }}" @class([
                  'nav-link d-flex align-items-center',
                  'active' => request()->is(['income-transaction']),
              ])>
                  <i class="bi bi-receipt me-2"></i>
                  <span class="d-none d-md-inline">Income Transactions</span>
              </a>
          </li>

          <li class="nav-item">
              <a href="#" class="nav-link d-flex align-items-center">
                  <i class="bi bi-bar-chart-line-fill me-2"></i>
                  <span class="d-none d-md-inline">Reports</span>
              </a>
          </li>

          <li class="nav-item">
              <a href="#" class="nav-link d-flex align-items-center">
                  <i class="bi bi-gear-fill me-2"></i>
                  <span class="d-none d-md-inline">Settings</span>
              </a>
          </li>

      </ul>
  </div>
