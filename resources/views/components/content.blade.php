  <div class="flex-1 flex flex-col overflow-hidden">
      <!-- Top Navigation -->
      <header class="bg-white shadow-sm">
          <div class="flex items-center justify-between px-6 py-4">
              <div class="flex items-center">
                  <button class="md:hidden mr-4 text-gray-500">
                      <i class="fas fa-bars"></i>
                  </button>
                  <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
              </div>

              <div class="flex items-center">
                  <div class="relative mr-4">
                      <input type="text" placeholder="Search..."
                          class="pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                      <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                  </div>
                  <button class="p-2 text-gray-500 hover:text-gray-600">
                      <i class="fas fa-bell"></i>
                  </button>
              </div>
          </div>
      </header>

      <!-- Main Content Area -->
      <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
          <!-- Stats Cards -->
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center justify-between">
                      <div>
                          <p class="text-gray-500">Total Users</p>
                          <h3 class="text-2xl font-bold" id="totalUsers">Loading...</h3>
                      </div>
                      <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                          <i class="fas fa-users"></i>
                      </div>
                  </div>
                  <p class="text-sm text-green-500 mt-2">
                      <i class="fas fa-arrow-up mr-1"></i> 12% from last month
                  </p>
              </div>

              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center justify-between">
                      <div>
                          <p class="text-gray-500">Total Revenue</p>
                          <h3 class="text-2xl font-bold" id="totalRevenue">Loading...</h3>
                      </div>
                      <div class="p-3 rounded-full bg-green-100 text-green-600">
                          <i class="fas fa-dollar-sign"></i>
                      </div>
                  </div>
                  <p class="text-sm text-green-500 mt-2">
                      <i class="fas fa-arrow-up mr-1"></i> 8% from last month
                  </p>
              </div>

              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center justify-between">
                      <div>
                          <p class="text-gray-500">Active Projects</p>
                          <h3 class="text-2xl font-bold" id="activeProjects">Loading...</h3>
                      </div>
                      <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                          <i class="fas fa-tasks"></i>
                      </div>
                  </div>
                  <p class="text-sm text-red-500 mt-2">
                      <i class="fas fa-arrow-down mr-1"></i> 3% from last month
                  </p>
              </div>

              <div class="bg-white rounded-lg shadow p-6">
                  <div class="flex items-center justify-between">
                      <div>
                          <p class="text-gray-500">Conversion Rate</p>
                          <h3 class="text-2xl font-bold" id="conversionRate">Loading...</h3>
                      </div>
                      <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                          <i class="fas fa-percentage"></i>
                      </div>
                  </div>
                  <p class="text-sm text-green-500 mt-2">
                      <i class="fas fa-arrow-up mr-1"></i> 2% from last month
                  </p>
              </div>
          </div>

          <!-- Charts and Tables -->
          <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
              <!-- Line Chart -->
              <div class="bg-white rounded-lg shadow p-6 lg:col-span-2">
                  <div class="flex items-center justify-between mb-4">
                      <h3 class="text-lg font-semibold">Sales Overview</h3>
                      <select
                          class="border border-gray-300 rounded px-3 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                          <option>Last 7 Days</option>
                          <option>Last 30 Days</option>
                          <option selected>Last 12 Months</option>
                      </select>
                  </div>
                  <div class="h-64" id="lineChart">
                      <!-- Chart will be rendered here -->
                      <div class="flex items-center justify-center h-full text-gray-400">
                          <i class="fas fa-spinner fa-spin mr-2"></i> Loading chart...
                      </div>
                  </div>
              </div>

              <!-- Recent Activity -->
              <div class="bg-white rounded-lg shadow p-6">
                  <h3 class="text-lg font-semibold mb-4">Recent Activity</h3>
                  <div class="space-y-4" id="recentActivity">
                      <!-- Activities will be loaded here -->
                      <div class="flex items-center justify-center h-32 text-gray-400">
                          <i class="fas fa-spinner fa-spin mr-2"></i> Loading activities...
                      </div>
                  </div>
              </div>
          </div>

          <!-- User Table -->
          <div class="bg-white rounded-lg shadow overflow-hidden">
              <div class="px-6 py-4 border-b border-gray-200">
                  <div class="flex items-center justify-between">
                      <h3 class="text-lg font-semibold">Recent Users</h3>
                      <button class="text-sm text-indigo-600 hover:text-indigo-800">View All</button>
                  </div>
              </div>
              <div class="overflow-x-auto">
                  <table class="min-w-full divide-y divide-gray-200">
                      <thead class="bg-gray-50">
                          <tr>
                              <th
                                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Name</th>
                              <th
                                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Email</th>
                              <th
                                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Status</th>
                              <th
                                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Role</th>
                              <th
                                  class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                  Actions</th>
                          </tr>
                      </thead>
                      <tbody class="bg-white divide-y divide-gray-200" id="userTableBody">
                          <!-- Users will be loaded here -->
                          <tr>
                              <td colspan="5" class="px-6 py-4 text-center text-gray-400">
                                  <i class="fas fa-spinner fa-spin mr-2"></i> Loading users...
                              </td>
                          </tr>
                      </tbody>
                  </table>
              </div>
          </div>
      </main>
  </div>
