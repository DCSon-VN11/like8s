@include('admin/head')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin/sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('admin/header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Đơn hàng
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
                            Danh sách đơn hàng
                        </h4>
                        <div>
                            <form class="flex" action="{{ route('ordersearch') }}" method="get">
                                @csrf
                                <input type="text" id="search-input" name="search" value="{{ request('search') }}"
                                    class="block w-1/3 px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring focus:ring-purple-300"
                                    placeholder="Tìm kiếm đơn hàng..." />
                                <button id="search-btn" type="submit"
                                    class="ml-2 px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300">
                                    Tìm kiếm
                                </button>
                            </form>
                        </div>
                    </div>
                    @php
                        $stateLabels = [
                            1 => 'Đã xác nhận',
                            2 => 'Đang xử lý',
                            3 => 'Đã hoàn thành',
                        ];
                    @endphp
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full table-fixed whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Tài khoản</th>
                                        <th class="px-4 py-3">Object_Id</th>
                                        <th class="px-4 py-3">Dịch vụ</th>
                                        <th class="px-4 py-3">Số lượng</th>
                                        <th class="px-4 py-3">Ghi chú</th>
                                        <th class="px-4 py-3">Trạng thái</th>
                                        <th class="px-4 py-3">Ngày đặt hàng</th>
                                        <th class="px-4 py-3">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($order as $item)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 truncate">
                                                {{ $item->account->username }}
                                            </td>
                                            <td class="px-4 py-3 text-sm truncate">
                                                {{ $item->object_id }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $item->service->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm truncate">
                                                {{ $item->amount }}
                                            </td>
                                            <td class="px-4 py-3 text-sm truncate">
                                                {{ $item->note }}
                                            </td>
                                            <td class="px-4 py-3 text-sm" data-state="{{ $item->state }}">
                                                <span
                                                    class="px-2 py-1 font-semibold leading-tight 
                                                    text-{{ $item->state == 1 ? 'red' : ($item->state == 2 ? 'green' : 'purple') }}-700 
                                                    bg-{{ $item->state == 1 ? 'red' : ($item->state == 2 ? 'green' : 'purple') }}-100 rounded-full">
                                                    {{ $stateLabels[$item->state] ?? 'Không xác định' }}
                                                </span>
                                            </td>
                                            <td class="px-4 py-3 text-sm truncate">
                                                {{ $item->created_at }}
                                            </td>
                                            <td class="px-4 py-3 truncate">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <button @click="openSmallModal" data-id="{{ $item->id }}"
                                                        class="edit-button flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                                        aria-label="Edit">
                                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div id="pagination"
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex items-center col-span-3">
                                Showing {{ $order->firstItem() }}-{{ $order->lastItem() }} of
                                {{ $order->total() }}
                            </span>
                            <span class="col-span-2"></span>

                            <!-- Kiểm tra nếu tổng số dịch vụ > 5 mới hiển thị phân trang -->
                            @if ($order->total() > 5)
                                <!-- Pagination -->
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">

                                            <!-- Previous Button -->
                                            @if ($order->onFirstPage())
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
                                                    <a href="{{ $order->previousPageUrl() }}"
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
                                                $currentPage = $order->currentPage();
                                                $lastPage = $order->lastPage();

                                                // Các trang liền kề hiện tại
                                                $start = max(2, $currentPage - 1);
                                                $end = min($lastPage - 1, $currentPage + 1);

                                            @endphp

                                            <li>
                                                <a href="{{ $order->url(1) }}"
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
                                                        <a href="{{ $order->url($page) }}"
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
                                            <li><a href="{{ $order->url($lastPage) }}"
                                                    class="px-3 py-1 {{ $currentPage == $lastPage ? 'text-white bg-purple-600 border border-r-0 border-purple-600 rounded-md' : 'focus:outline-none focus:shadow-outline-purple' }}">{{ $lastPage }}</a>
                                            </li>

                                            <!-- Next Button -->
                                            @if ($order->hasMorePages())
                                                <li>
                                                    <a href="{{ $order->nextPageUrl() }}"
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
                        <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                        <div x-show="isSmallModalOpen" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                            <!-- Modal -->
                            <div x-show="isSmallModalOpen" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0  transform translate-y-1/2"
                                @click.away="closeSmallModal" @keydown.escape="closeSmallModal"
                                class="w-3/10 px-3 py-2 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                                role="dialog" id="small-modal">
                                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                <header class="flex justify-between">
                                    <!-- Modal title -->
                                    <button
                                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                        aria-label="close" @click="closeSmallModal">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                                            aria-hidden="true">
                                            <path
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </header>
                                <!-- Modal body -->
                                <div class="mt-4 mb-4">
                                    <!-- Modal description -->
                                    <div class="px-4 py-3 mb-4 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                        <form action="{{ route('editorder') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" id="edit-id">
                                            <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Đổi trạng thái
                                                </span>
                                                <select name="state" id="edit-state"
                                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                                    @foreach ($stateLabels as $key => $label)
                                                        <option value="{{ $key }}">{{ $label }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                    </div>
                                </div>
                                <footer
                                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                    <button type="submit"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Đổi trạng thái
                                    </button>
                                    </form>
                                </footer>
                            </div>
                        </div>
                        <!-- End of modal backdrop -->
                        <script>
                            $(document).ready(function() {
                                // Sự kiện click nút Edit
                                $('.edit-button').click(function() {
                                    const row = $(this).closest('tr'); // Lấy dòng cha của nút
                                    const id = $(this).data('id');
                                    const state = row.find('[data-state]').data('state');

                                    // Gán giá trị vào modal
                                    $('#edit-id').val(id);
                                    $('#edit-state').val(state);
                                });
                            });
                        </script>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
