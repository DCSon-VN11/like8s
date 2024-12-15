@include('header')
@include('pagetitle', [
    'title' => 'NHẬT KÝ HOẠT ĐỘNG',
    'titlesm' => 'Dashboards',
    'page' => 'Nhật ký hoạt động',
])
<div class="dashboard">
    <div class="row">
        <div class="col-lg-12">

            <div class="card border-0">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputCity" class="form-label">Tìm kiếm</label>
                                <input type="text" name="key_search" class="form-control" id="formrow-inputCity"
                                    placeholder="Tìm theo object id">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label for="formrow-inputState" class="form-label">Limit</label>
                                <select onchange="getLogs()" id="formrow-inputState" name="limit" class="form-select">
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="3000">3000</option>
                                    <option value="5000">5000</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper no-footer">
                            <div class="dataTables_length mb-2" id="datatable_length"><label>Show <select
                                        name="datatable_length" aria-controls="datatable" class="">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                            <div id="datatable_filter" class="dataTables_filter"><label>Search:<input type="search"
                                        class="" placeholder="" aria-controls="datatable"></label></div>
                            <table id="datatable"
                                class="table table-bordered nowrap w-100 table-responsive dataTable no-footer"
                                aria-describedby="datatable_info">
                                <thead>
                                    <tr>
                                        <th class="sorting sorting_asc" tabindex="0" aria-controls="datatable"
                                            rowspan="1" colspan="1" style="width: 71.4375px;"
                                            aria-sort="ascending" aria-label="STT: activate to sort column descending">
                                            STT</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 138.922px;"
                                            aria-label="Username: activate to sort column ascending">Username</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 147.766px;"
                                            aria-label="Hành động: activate to sort column ascending">Hành động</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 139.891px;"
                                            aria-label="Đối tượng: activate to sort column ascending">Đối tượng</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 57.4531px;"
                                            aria-label="Xu: activate to sort column ascending">Xu</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 113.422px;"
                                            aria-label="Ghi chú: activate to sort column ascending">Ghi chú</th>
                                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1"
                                            colspan="1" style="width: 124.953px;"
                                            aria-label="Ngày tạo: activate to sort column ascending">Ngày tạo</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr class="odd">
                                        <td valign="top" colspan="7" class="dataTables_empty">No data available
                                            in table</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                                Showing 0 to 0 of 0 entries</div>
                            <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate"><a
                                    class="paginate_button previous disabled" aria-controls="datatable"
                                    aria-disabled="true" role="link" data-dt-idx="previous" tabindex="-1"
                                    id="datatable_previous">Previous</a><span></span><a
                                    class="paginate_button next disabled" aria-controls="datatable"
                                    aria-disabled="true" role="link" data-dt-idx="next" tabindex="-1"
                                    id="datatable_next">Next</a></div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
