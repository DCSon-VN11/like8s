@include('admin/head')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin/sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('admin/header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-3 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Dashboard
                    </h2>
                    
                    @if (session('success'))
                        <div class="thong-bao alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="thong-bao alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    <!-- Cards -->
                    <div class="grid gap-6 mb-6 md:grid-cols-2 xl:grid-cols-4">
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 576 512">
                                    <path
                                        d="M64 64C28.7 64 0 92.7 0 128L0 384c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-256c0-35.3-28.7-64-64-64L64 64zm64 320l-64 0 0-64c35.3 0 64 28.7 64 64zM64 192l0-64 64 0c0 35.3-28.7 64-64 64zM448 384c0-35.3 28.7-64 64-64l0 64-64 0zm64-192c-35.3 0-64-28.7-64-64l64 0 0 64zM288 160a96 96 0 1 1 0 192 96 96 0 1 1 0-192z" />
                                </svg>

                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Thu nhập ngày
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ number_format($totalToday, 0, ',', '.') }} VNĐ
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Thu nhập tháng
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ number_format($totalThisMonth, 0, ',', '.') }} VNĐ
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Đơn hàng ngày
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ $ordersToday->total() }}
                                </p>
                            </div>
                        </div>
                        <!-- Card -->
                        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                            <div
                                class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                    Đơn hàng tháng
                                </p>
                                <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                    {{ count($ordersThisMonth) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @php
                        $stateLabels = [
                            1 => 'Đã xác nhận',
                            2 => 'Đang xử lý',
                            3 => 'Đã hoàn thành',
                        ];
                    @endphp
                    <!-- New Table -->
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Client</th>
                                        <th class="px-4 py-3">Service</th>
                                        <th class="px-4 py-3">Platform</th>
                                        <th class="px-4 py-3">Object ID</th>
                                        <th class="px-4 py-3">Total</th>
                                        <th class="px-4 py-3">Amount</th>
                                        <th class="px-4 py-3">Status</th>
                                        <th class="px-4 py-3">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($ordersToday as $order)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <a href="order">
                                                    <div class="flex items-center text-sm">
                                                        <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                            <img class="object-cover w-full h-full rounded-full"
                                                                src="../image/{{ $order->account->userinfo->avatar ?? 'logo.svg' }}" />
                                                            <div class="absolute inset-0 rounded-full shadow-inner"
                                                                aria-hidden="true"></div>
                                                        </div>
                                                        <div>
                                                            <p class="font-semibold">{{ $order->account->username }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm"><a href="order">{{ $order->service->name }}</a>
                                            </td>
                                            <td class="px-4 py-3 text-sm"><a
                                                    href="order">{{ $order->service->platform->name }}</a></td>
                                            <td class="px-4 py-3 text-sm"><a href="order">{{ $order->object_id }}</a></td>
                                            
                                            <td class="px-4 py-3 text-sm"><a href="order">{{ $order->amount }}</a></td>
                                            
                                            <td class="px-4 py-3 text-sm"><a href="order">
                                                    {{ number_format($order->money, 0, ',', '.') }} VNĐ</a></td>
                                            <td class="px-4 py-3 text-sm"><a href="order">
                                                    <span
                                                        class="px-2 py-1 font-semibold leading-tight 
                                                    text-{{ $order->state == 1 ? 'red' : ($order->state == 2 ? 'green' : 'purple') }}-700 
                                                    bg-{{ $order->state == 1 ? 'red' : ($order->state == 2 ? 'green' : 'purple') }}-100 rounded-full">
                                                        {{ $stateLabels[$order->state] ?? 'Không xác định' }}
                                                    </span>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm"><a href="order">
                                                    {{ $order->created_at->format('H:i d/m/Y') }}
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div id="pagination"
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex items-center col-span-3">
                                Showing {{ $ordersToday->firstItem() }}-{{ $ordersToday->lastItem() }} of
                                {{ $ordersToday->total() }}
                            </span>
                            <span class="col-span-2"></span>

                            <!-- Kiểm tra nếu tổng số dịch vụ > 5 mới hiển thị phân trang -->
                            @if ($ordersToday->total() > 5)
                                <!-- Pagination -->
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">

                                            <!-- Previous Button -->
                                            @if ($ordersToday->onFirstPage())
                                                <li>
                                                    <button
                                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Previous" disabled>
                                                        <svg aria-hidden="true" class="w-4 h-4 fill-current"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                            @else
                                                <li>
                                                    <a href="{{ $ordersToday->previousPageUrl() }}"
                                                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Previous">
                                                        <svg aria-hidden="true" class="w-4 h-4 fill-current"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @endif

                                            @php
                                                $currentPage = $ordersToday->currentPage();
                                                $lastPage = $ordersToday->lastPage();

                                                // Các trang liền kề hiện tại
                                                $start = max(2, $currentPage - 1);
                                                $end = min($lastPage - 1, $currentPage + 1);

                                            @endphp

                                            <li>
                                                <a href="{{ $ordersToday->url(1) }}"
                                                    class="px-3 py-1 {{ $currentPage == 1 ? 'text-white bg-purple-600 border border-r-0 border-purple-600 rounded-md' : 'focus:outline-none focus:shadow-outline-purple' }}">1</a>
                                            </li>

                                            @if ($lastPage > 2)
                                                <!-- Trang đầu và dấu "..." -->
                                                @if ($currentPage > 3)
                                                    <li><span class="px-3 py-1">...</span></li>
                                                @endif

                                                <!-- Các trang trong khoảng từ $start đến $end -->
                                                @foreach (range($start, $end) as $page)
                                                    <li>
                                                        <a href="{{ $ordersToday->url($page) }}"
                                                            class="px-3 py-1 {{ $page == $currentPage ? 'text-white bg-purple-600 border border-r-0 border-purple-600 rounded-md' : 'focus:outline-none focus:shadow-outline-purple' }}">
                                                            {{ $page }}
                                                        </a>
                                                    </li>
                                                @endforeach

                                                <!-- Dấu "..." và trang cuối -->
                                                @if ($currentPage < $lastPage - 2)
                                                    <li><span class="px-3 py-1">...</span></li>
                                                @endif
                                            @endif
                                            <li><a href="{{ $ordersToday->url($lastPage) }}"
                                                    class="px-3 py-1 {{ $currentPage == $lastPage ? 'text-white bg-purple-600 border border-r-0 border-purple-600 rounded-md' : 'focus:outline-none focus:shadow-outline-purple' }}">{{ $lastPage }}</a>
                                            </li>

                                            <!-- Next Button -->
                                            @if ($ordersToday->hasMorePages())
                                                <li>
                                                    <a href="{{ $ordersToday->nextPageUrl() }}"
                                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Next">
                                                        <svg class="w-4 h-4 fill-current" aria-hidden="true"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </a>
                                                </li>
                                            @else
                                                <li>
                                                    <button
                                                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple"
                                                        aria-label="Next" disabled>
                                                        <svg class="w-4 h-4 fill-current" aria-hidden="true"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                                        </svg>
                                                    </button>
                                                </li>
                                            @endif

                                        </ul>
                                    </nav>
                                </span>
                            @endif
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
