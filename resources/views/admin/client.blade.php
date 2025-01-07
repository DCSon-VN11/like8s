@include('admin/head')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin/sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('admin/header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Khách hàng
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
                    <!-- With actions -->
                    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 dark:bg-gray-800">
                        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-4">
                            Danh sách khách hàng
                        </h4>
                        <div>
                            <form class="flex" action="{{ route('clientsearch') }}" method="get">
                                @csrf
                                <input type="text" id="search-input" name="search" value="{{ request('search') }}"
                                    class="block w-1/3 px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring focus:ring-purple-300"
                                    placeholder="Tìm kiếm khách hàng..." />
                                <button id="search-btn" type="submit"
                                    class="ml-2 px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300">
                                    Tìm kiếm
                                </button>
                            </form>
                        </div>
                    </div>
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Tên</th>
                                        <th class="px-4 py-3">Tài khoản</th>
                                        <th class="px-4 py-3">Email</th>
                                        <th class="px-4 py-3">Số điện thoại</th>
                                        <th class="px-4 py-3">Ngày tham gia</th>
                                        <th class="px-4 py-3">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($client as $item)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3">
                                                <div class="flex items-center text-sm">
                                                    <!-- Avatar with inset shadow -->
                                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                        <img class="object-cover w-full h-full rounded-full"
                                                            src="../image/{{ $item->userinfo->avatar ?? 'logo.svg' }}"
                                                            alt="" loading="lazy" />
                                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                                            aria-hidden="true"></div>
                                                    </div>
                                                    <div>
                                                        <p class="font-semibold">{{$item->userinfo->name ?? ''}}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $item->username ?? ''}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $item->userinfo->email ?? ''}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $item->userinfo->phone ?? ''}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $item->created_at}}
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <form id="ClientState{{ $item->id }}"
                                                    action="{{ route('clientstate') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <input type="hidden" name="state"
                                                        value="{{ $item->state}}">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                            id="ClientStateCheckbox{{ $item->id }}"
                                                            {{ $item->state == 'active' ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <script>
                            // Sử dụng jQuery để xử lý sự kiện thay đổi cho từng checkbox
                            @foreach ($client as $item)
                                $('#ClientStateCheckbox{{ $item->id }}').change(function() {
                                    // Gửi form khi checkbox được thay đổi
                                    $('#ClientState{{ $item->id }}').submit();
                                });
                            @endforeach
                        </script>
                        <div id="pagination"
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex items-center col-span-3">
                                Showing {{ $client->firstItem() }}-{{ $client->lastItem() }} of
                                {{ $client->total() }}
                            </span>
                            <span class="col-span-2"></span>

                            <!-- Kiểm tra nếu tổng số dịch vụ > 5 mới hiển thị phân trang -->
                            @if ($client->total() > 5)
                                <!-- Pagination -->
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">

                                            <!-- Previous Button -->
                                            @if ($client->onFirstPage())
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
                                                    <a href="{{ $client->previousPageUrl() }}"
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
                                                $currentPage = $client->currentPage();
                                                $lastPage = $client->lastPage();

                                                // Các trang liền kề hiện tại
                                                $start = max(2, $currentPage - 1);
                                                $end = min($lastPage - 1, $currentPage + 1);

                                            @endphp

                                            <li>
                                                <a href="{{ $client->url(1) }}"
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
                                                        <a href="{{ $client->url($page) }}"
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
                                            <li><a href="{{ $client->url($lastPage) }}"
                                                    class="px-3 py-1 {{ $currentPage == $lastPage ? 'text-white bg-purple-600 border border-r-0 border-purple-600 rounded-md' : 'focus:outline-none focus:shadow-outline-purple' }}">{{ $lastPage }}</a>
                                            </li>

                                            <!-- Next Button -->
                                            @if ($client->hasMorePages())
                                                <li>
                                                    <a href="{{ $client->nextPageUrl() }}"
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
