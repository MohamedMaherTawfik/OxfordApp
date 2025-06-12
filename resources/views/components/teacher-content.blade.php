<!-- Main Content -->
<div class="flex flex-col flex-1 overflow-hidden">

    <!-- Main Content Area -->
    <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Dashboard Overview</h1>
            <p class="text-gray-600">Welcome back,<span style="font-weight: bold"> {{ Auth::user()->name }} </span>Here's
                what's happening today.
            </p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Total Revenue</p>
                        <p class="text-2xl font-semibold text-gray-800">$45,231</p>
                        <p class="text-sm text-green-500 mt-1">+12.5% from last month</p>
                    </div>
                    <div class="p-3 bg-indigo-100 rounded-lg text-indigo-600">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">New Users</p>
                        <p class="text-2xl font-semibold text-gray-800">1,234</p>
                        <p class="text-sm text-green-500 mt-1">+8.3% from last month</p>
                    </div>
                    <div class="p-3 bg-green-100 rounded-lg text-green-600">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Pending Orders</p>
                        <p class="text-2xl font-semibold text-gray-800">326</p>
                        <p class="text-sm text-red-500 mt-1">-2.1% from last month</p>
                    </div>
                    <div class="p-3 bg-yellow-100 rounded-lg text-yellow-600">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Active Projects</p>
                        <p class="text-2xl font-semibold text-gray-800">24</p>
                        <p class="text-sm text-green-500 mt-1">+4.2% from last month</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-lg text-purple-600">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Tables -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
            <!-- Sales Chart -->
            <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Sales Overview</h2>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm bg-indigo-100 text-indigo-700 rounded-md">Month</button>
                        <button class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-md">Week</button>
                        <button class="px-3 py-1 text-sm bg-gray-100 text-gray-700 rounded-md">Day</button>
                    </div>
                </div>
                <div class="h-80 bg-gray-50 rounded-lg flex items-center justify-center">
                    <!-- Chart placeholder - would be replaced with actual chart library like Chart.js -->
                    <p class="text-gray-400">Sales Chart Visualization</p>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
                <h2 class="text-lg font-semibold text-gray-800 mb-4">Recent Activity</h2>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="p-2 bg-blue-100 rounded-lg text-blue-600 mr-3">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New user registered</p>
                            <p class="text-xs text-gray-500">Sarah Johnson - 2 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-2 bg-green-100 rounded-lg text-green-600 mr-3">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New order received</p>
                            <p class="text-xs text-gray-500">Order #12345 - 3 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-2 bg-purple-100 rounded-lg text-purple-600 mr-3">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">New support ticket</p>
                            <p class="text-xs text-gray-500">Ticket #54321 - 5 hours ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-2 bg-yellow-100 rounded-lg text-yellow-600 mr-3">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Payment processed</p>
                            <p class="text-xs text-gray-500">Invoice #9876 - 1 day ago</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="p-2 bg-red-100 rounded-lg text-red-600 mr-3">
                            <i class="fas fa-exclamation-circle"></i>
                        </div>
                        <div>
                            <p class="text-sm font-medium">High priority alert</p>
                            <p class="text-xs text-gray-500">Server CPU usage - 1 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Orders Table -->
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-semibold text-gray-800">Recent Orders</h2>
                <button class="px-4 py-2 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                    View All
                </button>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Customer</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Amount</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12345</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">John Smith</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-15</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$245.00</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12346</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Emily Johnson</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-14</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$189.00</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12347</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Michael Brown</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Shipped</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-14</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$320.50</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12348</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Sarah Williams</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Cancelled</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-13</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$175.00</td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#12349</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">David Miller</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span
                                    class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Completed</span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2023-06-12</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">$420.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
