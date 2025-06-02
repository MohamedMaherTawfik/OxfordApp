<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 font-sans">

    <!-- Header -->
    <x-header />
    <!-- Main Layout -->
    <div class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <x-sidebar />

        <!-- Main Content -->
        {{ $slot }}
    </div>

    <script>
        // Simulate AJAX data loading
        document.addEventListener('DOMContentLoaded', function() {
            // Load stats
            setTimeout(() => {
                document.getElementById('totalUsers').textContent = '1,248';
                document.getElementById('totalRevenue').textContent = '$34,876';
                document.getElementById('activeProjects').textContent = '56';
                document.getElementById('conversionRate').textContent = '3.2%';
            }, 800);

            // Load recent activity
            setTimeout(() => {
                const activities = [{
                        icon: 'fa-user-plus',
                        color: 'bg-blue-100 text-blue-600',
                        text: 'New user registered',
                        time: '2 min ago'
                    },
                    {
                        icon: 'fa-shopping-cart',
                        color: 'bg-green-100 text-green-600',
                        text: 'New order received',
                        time: '24 min ago'
                    },
                    {
                        icon: 'fa-file-invoice',
                        color: 'bg-purple-100 text-purple-600',
                        text: 'Invoice #1234 generated',
                        time: '1 hour ago'
                    },
                    {
                        icon: 'fa-comment',
                        color: 'bg-yellow-100 text-yellow-600',
                        text: 'New customer message',
                        time: '2 hours ago'
                    }
                ];

                let activityHtml = '';
                activities.forEach(activity => {
                    activityHtml += `
                        <div class="flex items-start">
                            <div class="flex-shrink-0 p-2 rounded-full ${activity.color} mr-3">
                                <i class="fas ${activity.icon} text-sm"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium">${activity.text}</p>
                                <p class="text-xs text-gray-500">${activity.time}</p>
                            </div>
                        </div>
                    `;
                });

                document.getElementById('recentActivity').innerHTML = activityHtml;
            }, 1000);

            // Load user table
            setTimeout(() => {
                const users = [{
                        name: 'John Smith',
                        email: 'john@example.com',
                        status: 'Active',
                        role: 'Admin',
                        avatar: 'https://randomuser.me/api/portraits/men/32.jpg'
                    },
                    {
                        name: 'Sarah Johnson',
                        email: 'sarah@example.com',
                        status: 'Active',
                        role: 'User',
                        avatar: 'https://randomuser.me/api/portraits/women/44.jpg'
                    },
                    {
                        name: 'Michael Brown',
                        email: 'michael@example.com',
                        status: 'Inactive',
                        role: 'Editor',
                        avatar: 'https://randomuser.me/api/portraits/men/75.jpg'
                    },
                    {
                        name: 'Emily Davis',
                        email: 'emily@example.com',
                        status: 'Active',
                        role: 'User',
                        avatar: 'https://randomuser.me/api/portraits/women/63.jpg'
                    },
                    {
                        name: 'Robert Wilson',
                        email: 'robert@example.com',
                        status: 'Pending',
                        role: 'User',
                        avatar: 'https://randomuser.me/api/portraits/men/81.jpg'
                    }
                ];

                let userHtml = '';
                users.forEach(user => {
                    let statusClass = '';
                    if (user.status === 'Active') statusClass = 'bg-green-100 text-green-800';
                    else if (user.status === 'Inactive') statusClass = 'bg-red-100 text-red-800';
                    else statusClass = 'bg-yellow-100 text-yellow-800';

                    userHtml += `
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="${user.avatar}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">${user.name}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">${user.email}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full ${statusClass}">
                                    ${user.status}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                ${user.role}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                            </td>
                        </tr>
                    `;
                });

                document.getElementById('userTableBody').innerHTML = userHtml;
            }, 1200);

            // Simulate chart loading
            setTimeout(() => {
                document.getElementById('lineChart').innerHTML = `
                    <div class="flex items-center justify-center h-full">
                        <img src="https://via.placeholder.com/600x250?text=Sales+Chart" alt="Sales Chart" class="w-full h-auto">
                    </div>
                `;
            }, 1500);
        });

        // In a real application, you would use fetch or axios for AJAX calls:
        /*
        async function loadData() {
            try {
                const response = await fetch('/api/dashboard/stats');
                const data = await response.json();
                document.getElementById('totalUsers').textContent = data.totalUsers;
                // Update other elements...
            } catch (error) {
                console.error('Error loading data:', error);
            }
        }
        loadData();
        */
    </script>
</body>

</html>
