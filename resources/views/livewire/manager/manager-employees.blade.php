<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Employees</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle"><a href="#"
                                    class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="more-options"><em
                                        class="icon ni ni-more-v"></em></a>
                                <div class="toggle-expand-content" data-content="more-options">
                                    <ul class="nk-block-tools g-3">
                                        <li>
                                            <div class="form-control-wrap">
                                                <div class="form-icon form-icon-right"><em
                                                        class="icon ni ni-search"></em></div><input wire:model='search'
                                                    type="text" class="form-control" id="default-04"
                                                    placeholder="Search by name">
                                            </div>
                                        </li>
                                        <li class="nk-block-tools-opt"><a href="#"
                                                class="btn btn-icon btn-primary d-md-none"><em
                                                    class="icon ni ni-plus"></em></a><a href="#"
                                                class="btn btn-primary d-none d-md-inline-flex" data-toggle="modal"
                                                data-target="#addModal"><em class="icon ni ni-plus"></em><span>Add
                                                    Employee</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="nk-tb-list is-separate mb-3">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext"><input
                                            type="checkbox" class="custom-control-input" id="uid"><label
                                            class="custom-control-label" for="uid"></label></div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Name</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Sex</span></div>
                                <div class="nk-tb-col tb-col-mb"><span class="sub-text">Department</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Position</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Leave Taken</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Remaining Days</span></div>
                                <div class="nk-tb-col nk-tb-col-tools">
                                    <ul class="nk-tb-actions gx-1 my-n1">
                                        <li>
                                            <div class="drodown">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger mr-n1"
                                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"><em
                                                                    class="icon ni ni-trash"></em><span>Bulk
                                                                    Delete</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            @foreach ($employees as $employee)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext"><input
                                                type="checkbox" class="custom-control-input" id="uid1"><label
                                                class="custom-control-label" for="uid1"></label></div>
                                    </div>
                                    <div class="nk-tb-col"><a href="/demo2/ecommerce/customer-details.html">
                                            <div class="user-card">
                                                <div class="user-avatar bg-primary">
                                                    <span>
                                                        <img src="https://ui-avatars.com/api/?name={{ urlencode($employee->user->name) }}"
                                                            alt="{{ $employee->user->name }}">
                                                    </span>
                                                </div>
                                                <div class="user-info"><span class="tb-lead">{{ $employee->user->name }}
                                                        <span
                                                            class="dot dot-success d-md-none ms-1"></span></span><span>{{ $employee->user->email }}
                                                    </span>
                                                </div>
                                            </div>
                                        </a></div>
                                    <div class="nk-tb-col tb-col-mb"><span
                                            class="tb-amount">{{ $employee->gender }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{ $employee->dept->name }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-lg">
                                        <span>{{ ucwords(str_replace('_', ' ', $employee->user->user_type)) }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md"><span
                                            class="tb-status text-warning">{{ $employee->leave_taken }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md"><span
                                            class="tb-status text-success">{{ $employee->available_days == 0 && $employee->leave_taken == 0 ? $employee->days : $employee->available_days }}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <div class="drodown mr-n1">
                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#deleteHoliday"
                                                                wire:click.prevent="delete({{ $employee->id }})">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="card-inner">
                            <div class="nk-block-between-md g-3">
                                <div class="g">
                                    <ul class="pagination justify-content-center justify-content-md-start">
                                        {{ $employees->links() }}
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="addModal">
        <div class="modal-dialog modal-lg modal-dialog-top" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add User</h5>
                    <form wire:submit.prevent="addEmployee" class="mt-2">
                        @csrf
                        <div class="row g-gs">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="order_number">Name</label>
                                    <div class="form-control-wrap">
                                        <input wire:model="name" type="text" class="form-control" id="name"
                                            placeholder="Enter Name">
                                    </div>
                                    @error('name')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror

                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="items">Email</label>
                                    <div class="form-control-wrap">
                                        <input wire:model="email" type="text" class="form-control" id="email"
                                            placeholder="Enter Item">
                                    </div>
                                    @error('email')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="password">Password</label>
                                    <div class="form-control-wrap">
                                        <input wire:model="password" type="password" class="form-control"
                                            id="password" placeholder="Enter Password">
                                    </div>
                                    @error('password')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="user_type">Position
                                    </label>
                                    <div class="form-control-wrap">
                                        <select wire:model="user_type" class="form-control" data-search="on">
                                            <option>Select Position</option>
                                            @if (Auth::user()->user_type == 'admin' || 'general_manager')
                                                <option value="manager">Manager</option>
                                                <option value="general_manager">General Manager</option>
                                                <option value="admin">Administrator</option>
                                            @endif
                                            <option value="employee">Employee</option>
                                        </select>
                                    </div>
                                    @error('user_type')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="employee_id">Employee Id</label>
                                    <div class="form-control-wrap">
                                        <input wire:model="employee_id" type="text" class="form-control"
                                            id="employee_id" placeholder="Enter Price">
                                    </div>
                                    @error('employee_id')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="department">Department</label>
                                    <div class="form-control-wrap">
                                        <select wire:model="department" class="form-control" data-search="on">
                                            <option>Select Department</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id }}">{{ $department->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="gender">Gender
                                    </label>
                                    <div class="form-control-wrap">
                                        <select wire:model="gender" class="form-control" data-search="on">
                                            <option>Select Gender</option>
                                            <option value="Male">Male
                                            </option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                    @error('gender')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">

                                    <div wire:loading wire:target='addEmployee'>
                                    </div>Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- .Add Modal-Content -->
</div>




@push('scripts')
    <script>
        function printableDiv(printableAreaDivId) {
            var printContents = document.getElementById(printableAreaDivId).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
