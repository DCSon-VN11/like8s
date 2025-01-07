@include('admin/head')

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        @include('admin/sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('admin/header')
            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                            Dịch vụ
                        </h2>
                        <div class="flex items-center space-x-2">
                            <button @click="openSmallModal"
                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-gray">
                                Nền tảng
                            </button>
                            <button @click="openModal"
                                class="ml-6 flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white bg-purple-600 rounded-lg hover:bg-purple-700 focus:outline-none focus:shadow-outline-gray"
                                aria-label="Thêm dịch vụ">
                                Thêm dịch vụ
                            </button>
                        </div>
                    </div>
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
                    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                    <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                        <!-- Modal -->
                        <div x-show="isModalOpen" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 transform translate-y-1/2"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeModal"
                            @keydown.escape="closeModal"
                            class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                            role="dialog" id="modal">
                            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                            <header class="flex justify-between">
                                <!-- Modal title -->
                                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                                    Thêm dịch vụ mới
                                </p>
                                <button
                                    class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                    aria-label="close" @click="closeModal">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                                        aria-hidden="true">
                                        <path
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </header>
                            <!-- Modal body -->
                            <div class="mt-4 mb-6">
                                <!-- Modal description -->
                                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                    <form action="{{ route('addservice') }}" method="post">
                                        @csrf
                                        <label class="block text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Tên dịch vụ</span>
                                            <input name="name" required
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                placeholder="Jane Doe" />
                                        </label>
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Kiểu dịch vụ
                                            </span>
                                            <select name="servicetypeid"
                                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                                @foreach ($servicetype as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                        <label class="block mt-4 text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">
                                                Nền tảng
                                            </span>
                                            <select name="platformid"
                                                class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                                @foreach ($platform as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </label>
                                        <label class="block text-sm mt-4">
                                            <span class="text-gray-700 dark:text-gray-400">Giá</span>
                                            <input name="price" required
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                placeholder="Jane Doe" />
                                        </label>
                                </div>
                            </div>
                            <footer
                                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                <button @click="closeModal" type="button"
                                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                    Cancel
                                </button>
                                <button type="submit"
                                    class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                    Thêm
                                </button>
                                </form>
                            </footer>
                        </div>
                    </div>
                    <!-- End of modal backdrop -->
                    <!-- Modal backdrop. This what you want to place close to the closing body tag -->
                    <div x-show="isSmallModalOpen" x-transition:enter="transition ease-out duration-150"
                        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                        <!-- Modal -->
                        <div x-show="isSmallModalOpen" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 transform translate-y-1/2"
                            x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100"
                            x-transition:leave-end="opacity-0  transform translate-y-1/2" @click.away="closeSmallModal"
                            @keydown.escape="closeSmallModal"
                            class="w-3/10 px-3 py-2 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                            role="dialog" id="small-modal">
                            <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                            <header class="flex justify-between">
                                <!-- Modal title -->
                                <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                                    Nền tảng
                                </p>
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
                            <div class="mt-4 mb-6">
                                <!-- Modal description -->
                                <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                    <form action="{{ route('addplatform') }}" method="post">
                                        @csrf
                                        <label class="block text-sm">
                                            <span class="text-gray-700 dark:text-gray-400">Tên nền tảng</span>
                                            <input name="name"
                                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                placeholder="Jane Doe" />
                                        </label>
                                        <button type="submit"
                                            class="mt-2 w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                            Thêm
                                        </button>
                                    </form>
                                    <table class="w-full whitespace-no-wrap mt-4">
                                        <thead>
                                            <tr
                                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th class="px-4 py-3">Tên nền tảng</th>
                                                <th class="px-4 py-3">Trạng thái</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            @foreach ($platform as $item)
                                                <tr class="text-gray-700 dark:text-gray-400">
                                                    <td class="px-4 py-3">
                                                        {{ $item->name }}
                                                    </td>
                                                    <td class="px-4 py-3">
                                                        <form id="platformstate{{ $item->id }}"
                                                            action="{{ route('platformstate') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                value="{{ $item->id }}">
                                                            <input type="hidden" name="state"
                                                                value="{{ $item->state == 1 ?? 0 }}">
                                                            <label class="switch">
                                                                <input type="checkbox"
                                                                    id="platformstatecheckbox{{ $item->id }}"
                                                                    {{ $item->state == 1 ? 'checked' : '' }}>
                                                                <span class="slider"></span>
                                                            </label>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <script>
                                        // Sử dụng jQuery để xử lý sự kiện thay đổi cho từng checkbox
                                        @foreach ($platform as $item)
                                            $('#platformstatecheckbox{{ $item->id }}').change(function() {
                                                // Gửi form khi checkbox được thay đổi
                                                $('#platformstate{{ $item->id }}').submit();
                                            });
                                        @endforeach
                                    </script>
                                </div>
                            </div>
                            <footer
                                class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                            </footer>
                        </div>
                    </div>
                    <!-- End of modal backdrop -->
                    <!-- With actions -->
                    <div class="flex items-center justify-between px-4 py-3 bg-gray-50 dark:bg-gray-800">
                        <h4 class="text-lg font-semibold text-gray-600 dark:text-gray-300 mb-4">
                            Danh sách dịch vụ
                        </h4>
                        <div>
                            <form class="flex" action="{{ route('servicesearch') }}" method="get">
                                @csrf
                                <input type="text" id="search-input" name="search"
                                    value="{{ request('search') }}"
                                    class="block w-1/3 px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 focus:outline-none focus:ring focus:ring-purple-300"
                                    placeholder="Tìm kiếm dịch vụ..." />
                                <button id="search-btn" type="submit"
                                    class="ml-2 px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-purple-700 focus:outline-none focus:ring focus:ring-purple-300">
                                    Tìm kiếm
                                </button>
                            </form>
                        </div>
                    </div>
                    <div id="service-table" class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3">Tên dịch vụ</th>
                                        <th class="px-4 py-3">Kiểu dịch vụ</th>
                                        <th class="px-4 py-3">Nền tảng</th>
                                        <th class="px-4 py-3">Giá</th>
                                        <th class="px-4 py-3">Trạng thái</th>
                                        <th class="px-4 py-3">Hành động</th>
                                    </tr>
                                </thead>
                                <tbody id="service-table-body"
                                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($service as $item)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3" data-name="{{ $item->name }}">
                                                {{ $item->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm"
                                                data-service-type="{{ $item->servicetype->id }}">
                                                {{ $item->servicetype->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm" data-platform="{{ $item->platform->id }}">
                                                {{ $item->platform->name }}
                                            </td>
                                            <td class="px-4 py-3 text-sm" data-price="{{ $item->price }}">
                                                {{ number_format($item->price, 0, ',', '.') }} VND
                                            </td>
                                            <td class="px-4 py-3 text-xs">
                                                <form id="serviceStateForm{{ $item->id }}"
                                                    action="{{ route('servicestate') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id"
                                                        value="{{ $item->id }}">
                                                    <input type="hidden" name="state"
                                                        value="{{ $item->state}}">
                                                    <label class="switch">
                                                        <input type="checkbox"
                                                            id="serviceStateCheckbox{{ $item->id }}"
                                                            {{ $item->state == 1 ? 'checked' : '' }}>
                                                        <span class="slider"></span>
                                                    </label>
                                                </form>
                                            </td>
                                            <td class="px-4 py-3">
                                                <div class="flex items-center space-x-4 text-sm">
                                                    <button @click="openModal2" data-id="{{ $item->id }}"
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
                        <script>
                            // Sử dụng jQuery để xử lý sự kiện thay đổi cho từng checkbox
                            @foreach ($service as $item)
                                $('#serviceStateCheckbox{{ $item->id }}').change(function() {
                                    // Gửi form khi checkbox được thay đổi
                                    $('#serviceStateForm{{ $item->id }}').submit();
                                });
                            @endforeach
                        </script>
                        <div id="pagination"
                            class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                            <span class="flex items-center col-span-3">
                                Showing {{ $service->firstItem() }}-{{ $service->lastItem() }} of
                                {{ $service->total() }}
                            </span>
                            <span class="col-span-2"></span>

                            <!-- Kiểm tra nếu tổng số dịch vụ > 5 mới hiển thị phân trang -->
                            @if ($service->total() > 5)
                                <!-- Pagination -->
                                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                                    <nav aria-label="Table navigation">
                                        <ul class="inline-flex items-center">

                                            <!-- Previous Button -->
                                            @if ($service->onFirstPage())
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
                                                    <a href="{{ $service->previousPageUrl() }}"
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
                                                $currentPage = $service->currentPage();
                                                $lastPage = $service->lastPage();

                                                // Các trang liền kề hiện tại
                                                $start = max(2, $currentPage - 1);
                                                $end = min($lastPage - 1, $currentPage + 1);

                                            @endphp

                                            <li>
                                                <a href="{{ $service->url(1) }}"
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
                                                        <a href="{{ $service->url($page) }}"
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
                                            <li><a href="{{ $service->url($lastPage) }}"
                                                    class="px-3 py-1 {{ $currentPage == $lastPage ? 'text-white bg-purple-600 border border-r-0 border-purple-600 rounded-md' : 'focus:outline-none focus:shadow-outline-purple' }}">{{ $lastPage }}</a>
                                            </li>

                                            <!-- Next Button -->
                                            @if ($service->hasMorePages())
                                                <li>
                                                    <a href="{{ $service->nextPageUrl() }}"
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
                        <div x-show="isModal2Open" x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            x-transition:leave="transition ease-in duration-150"
                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                            class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
                            <!-- Modal -->
                            <div x-show="isModal2Open" x-transition:enter="transition ease-out duration-150"
                                x-transition:enter-start="opacity-0 transform translate-y-1/2"
                                x-transition:enter-end="opacity-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0  transform translate-y-1/2"
                                @click.away="closeModal2" @keydown.escape="closeModal2"
                                class="w-full px-6 py-4 overflow-hidden bg-white rounded-t-lg dark:bg-gray-800 sm:rounded-lg sm:m-4 sm:max-w-xl"
                                role="dialog" id="modal2">
                                <!-- Remove header if you don't want a close icon. Use modal body to place modal tile. -->
                                <header class="flex justify-between">
                                    <!-- Modal title -->
                                    <p class="mb-2 text-lg font-semibold text-gray-700 dark:text-gray-300">
                                        Thêm dịch vụ mới
                                    </p>
                                    <button
                                        class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700"
                                        aria-label="close" @click="closeModal2">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img"
                                            aria-hidden="true">
                                            <path
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" fill-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </header>
                                <!-- Modal body -->
                                <div class="mt-4 mb-6">
                                    <!-- Modal description -->
                                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                        <form action="{{ route('editservice') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" id="edit-service-id">
                                            <label class="block text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">Tên dịch vụ</span>
                                                <input name="name" required id="edit-service-name"
                                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                    placeholder="Jane Doe" />
                                            </label>
                                            <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Kiểu dịch vụ
                                                </span>
                                                <select name="servicetypeid" id="edit-servicetypeid"
                                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                                    @foreach ($servicetype as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                            <label class="block mt-4 text-sm">
                                                <span class="text-gray-700 dark:text-gray-400">
                                                    Nền tảng
                                                </span>
                                                <select name="platformid" id="edit-platformid"
                                                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                                                    @foreach ($platform as $item)
                                                        <option value="{{ $item->id }}">{{ $item->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </label>
                                            <label class="block text-sm mt-4">
                                                <span class="text-gray-700 dark:text-gray-400">Giá</span>
                                                <input name="price" required id="edit-service-price"
                                                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                                    placeholder="Jane Doe" />
                                            </label>
                                    </div>
                                </div>
                                <footer
                                    class="flex flex-col items-center justify-end px-6 py-3 -mx-6 -mb-4 space-y-4 sm:space-y-0 sm:space-x-6 sm:flex-row bg-gray-50 dark:bg-gray-800">
                                    <button @click="closeModal2" type="button"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white text-gray-700 transition-colors duration-150 border border-gray-300 rounded-lg dark:text-gray-400 sm:px-4 sm:py-2 sm:w-auto active:bg-transparent hover:border-gray-500 focus:border-gray-500 active:text-gray-500 focus:outline-none focus:shadow-outline-gray">
                                        Cancel
                                    </button>
                                    <button type="submit"
                                        class="w-full px-5 py-3 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg sm:w-auto sm:px-4 sm:py-2 active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Sửa
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
                                    const name = row.find('[data-name]').data('name');
                                    const serviceTypeId = row.find('[data-service-type]').data('service-type');
                                    const platformId = row.find('[data-platform]').data('platform');
                                    const price = row.find('[data-price]').data('price');

                                    // Gán giá trị vào modal
                                    $('#edit-service-id').val(id);
                                    $('#edit-service-name').val(name);
                                    $('#edit-servicetypeid').val(serviceTypeId);
                                    $('#edit-platformid').val(platformId);
                                    $('#edit-service-price').val(price);
                                });
                            });
                        </script>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
