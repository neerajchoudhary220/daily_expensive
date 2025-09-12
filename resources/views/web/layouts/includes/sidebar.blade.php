  <div id="sidebar" class="bg-dark p-3">
      <h4 class="text-white mb-4">💸 ExpenseTracker</h4>
      <ul class="nav flex-column">
          <li class="nav-item">
              <a href="{{ route('dashboard') }}" @class([
                  'nav-link d-flex align-items-center',
                  'active' => request()->is(['/']),
              ])
                  class="nav-link active d-flex align-items-center"><i class="bi bi-speedometer2 me-2"></i>
                  Dashboard</a>
          </li>
          <li class="nav-item">
              <a href="{{ route('category') }}" @class([
                  'nav-link d-flex align-items-center',
                  'active' => request()->is(['category']),
              ])><i class="bi bi-folder-fill me-2"></i>
                  Categories</a>
          </li>
          <li class="nav-item">
              <a href="{{ route('items') }}" @class([
                  'nav-link d-flex align-items-center',
                  'active' => request()->is(['items']),
              ])><i class="bi bi-box-seam-fill me-2"></i>
                  Items</a>
          </li>
          <li class="nav-item">
              <a href="{{ route('expenses') }}" @class([
                  'nav-link d-flex align-items-center',
                  'active' => request()->is(['expenses']),
              ])><i class="bi bi-bag-fill me-2"></i>
                  Expenses</a>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link d-flex align-items-center"> <i
                      class="bi bi-bar-chart-line-fill me-2"></i> Reports</a>
          </li>
          <li class="nav-item">
              <a href="#" class="nav-link d-flex align-items-center"> <i class="bi bi-gear-fill me-2"></i>
                  Settings</a>
          </li>
      </ul>
  </div>
