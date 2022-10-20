{{-- <head>
   <style>
    .invoice-logo img {
position: fixed;
left: 27.333333333333%;
top: 82px;}
   </style>
</head> --}}
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head">
                    <div class="nk-block-between g-3">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Invoices</h3>
                            <div class="nk-block-des text-soft">
                                <p>You have total of {{ count($invoices) }} invoices.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <ul class="nk-block-tools g-3">
                                <li>
                                    <div class="drodown">
                                        <a href="#" class="btn btn-md btn-primary" data-toggle="modal"
                                            data-target="#addModal"><em class="icon ni ni-plus"></em>
                                            <span>Add Invoice</span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block">
                    <div class="card card-bordered card-stretch">
                        <div class="card-inner-group">
                            <div class="card-inner">
                                <div class="card-title-group">
                                    <div class="card-title">
                                        <h5 class="title">All Invoice</h5>
                                    </div>
                                    <div class="card-tools mr-n1">
                                        <ul class="btn-toolbar">
                                            <li>
                                                <a href="#" class="btn btn-icon search-toggle toggle-search"
                                                    data-target="search"><em class="icon ni ni-search"></em></a>
                                            </li><!-- li -->
                                            <li class="btn-toolbar-sep"></li><!-- li -->
                                            <li>
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-trigger btn-icon dropdown-toggle"
                                                        data-toggle="dropdown">
                                                        <em class="icon ni ni-setting"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs">
                                                        <ul class="link-check">
                                                            <li><span>Show</span></li>
                                                            <li class="active"><a href="#">10</a></li>
                                                            <li><a href="#">20</a></li>
                                                            <li><a href="#">50</a></li>
                                                        </ul>
                                                        <ul class="link-check">
                                                            <li><span>Order</span></li>
                                                            <li class="active"><a href="#">DESC</a></li>
                                                            <li><a href="#">ASC</a></li>
                                                        </ul>
                                                        <ul class="link-check">
                                                            <li><span>Density</span></li>
                                                            <li class="active"><a href="#">Regular</a></li>
                                                            <li><a href="#">Compact</a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .dropdown -->
                                            </li><!-- li -->
                                        </ul><!-- .btn-toolbar -->
                                    </div><!-- card-tools -->
                                    <div class="card-search search-wrap" data-search="search">
                                        <div class="search-content">
                                            <a href="#" class="search-back btn btn-icon toggle-search"
                                                data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                            <input type="text"
                                                class="form-control form-control-sm border-transparent form-focus-none"
                                                placeholder="Quick search by order id">
                                            <button class="search-submit btn btn-icon"><em
                                                    class="icon ni ni-search"></em></button>
                                        </div>
                                    </div><!-- card-search -->
                                </div><!-- .card-title-group -->
                            </div><!-- .card-inner -->
                            <div class="card-inner p-0">
                                <table class="table table-orders">
                                    <thead class="tb-odr-head">
                                        <tr class="tb-odr-item">
                                            <th class="tb-odr-info">
                                                <span class="tb-odr-id">Order ID</span>
                                                <span class="tb-odr-date d-none d-md-inline-block">Date</span>
                                            </th>
                                            <th class="tb-odr-amount">
                                                <span class="tb-odr-total">Amount</span>
                                                <span class="tb-odr-status d-none d-md-inline-block">Status</span>
                                            </th>
                                            <th class="tb-odr-action">&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody class="tb-odr-body">
                                        @if (count($invoices) > 0)

                                            @foreach ($invoices as $invoice)
                                                <tr class="tb-odr-item">
                                                    <td class="tb-odr-info">
                                                        <span class="tb-odr-id"><a
                                                                href="html/invoice-details.html">#{{ $invoice->order_number }}</a></span>
                                                        <span class="tb-odr-date">{{ $invoice->issued_on }}</span>
                                                    </td>
                                                    <td class="tb-odr-amount">
                                                        <span class="tb-odr-total">
                                                            <span class="amount">{{ $invoice->price }}</span>
                                                        </span>
                                                        <span class="tb-odr-status">
                                                            <?php if ($invoice->status == 'settled') {
                                                                echo '<span class="badge badge-dot badge-success">settled</span>';
                                                            } else {
                                                                echo '<span class="badge badge-dot badge-warning">pending</span>';
                                                            } ?>


                                                        </span>
                                                    </td>
                                                    <td class="tb-odr-action">
                                                        <div class="tb-odr-btns d-none d-sm-inline">
                                                            <a href="#" target="_blank"
                                                                class="btn btn-icon btn-white btn-dim btn-sm btn-primary"
                                                                onclick="printableDiv('printableArea')"><em
                                                                    class="icon ni ni-printer-fill"></em></a>
                                                            <button wire:click="showInvoiceDetails({{ $invoice->id }})"
                                                                class="btn btn-dim btn-sm btn-primary"
                                                                data-toggle="modal" data-target="#showModal">View
                                                            </button>

                                                        </div>
                                                        <a href="#" class="btn btn-pd-auto d-sm-none"><em
                                                                class="icon ni ni-chevron-right"></em></a>
                                                    </td>
                                                </tr><!-- .tb-odr-item -->
                                            @endforeach

                                        @endif
                                    </tbody>
                                </table>
                            </div><!-- .card-inner -->
                            <div class="card-inner">
                                <ul class="pagination justify-content-center justify-content-md-start">
                                    {{ $invoices->links() }}

                                </ul><!-- .pagination -->
                            </div><!-- .card-inner -->
                        </div><!-- .card-inner-group -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->

                {{-- Show invoice-details modal --}}
                {{-- <div wire:ignore.self class="modal fade" id="showModal">
                    <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                        <div id="printableArea">
                            <div class="modal-content">
                                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                    <em class="icon ni ni-cross-sm"></em>
                                </a>
                                <div class="modal-body modal-body-md">
                                    <h5 class="modal-title">Invoice</h5>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-logo">
                                                            <img src="{{ asset('theme/images/trial.png') }}"
                                                                alt="logo">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <p class="invoice-details">
                                                            <strong>Order:</strong> #{{ $order_number }} <br>
                                                            <strong>Issued:</strong> {{ $issued_on }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="invoice-info">
                                                            <strong class="customer-text">Invoice From</strong>
                                                            <p class="invoice-details invoice-details-two">
                                                                Accounts Office <br>
                                                                I&M Bank 2nd Ngong Avenue,<br>
                                                                Nairobi, Kenya <br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="invoice-info invoice-info2">
                                                            <strong class="customer-text">Invoice To</strong>
                                                            <p class="invoice-details">
                                                                {{ $name_invoicee }} <br>
                                                                {{ $address }}, <br>
                                                                {{ $city }}, {{ $country }} <br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <hr class="mt-0">

                                            <div class="invoice-item">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="invoice-info">
                                                            <strong class="customer-text">Payment Method</strong>
                                                            <p class="invoice-details invoice-details-two">
                                                                {{ $payment_method }} <br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="invoice-item invoice-table-wrap">
                                                <h5>Items</h5>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="table-responsive">
                                                            <table class="invoice-table table table-border mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="w-75">Items</th>
                                                                        <th class="text-end">Quantity</th>
                                                                        <th class="text-end">Price</th>
                                                                        <th class="text-end">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="w-50">{{ $items }}</td>
                                                                        <td class="text-end">{{ $quantity }}</td>
                                                                        <td class="text-end">{{ $price }}</td>
                                                                        <td class="text-end">@php
                                                                            echo floatval($price) * floatval($quantity);
                                                                        @endphp</td>
                                                                    </tr>
                                                                    <tr>
                                                                    <tr>
                                                                        <td colspan="3"
                                                                            class="text-end text-muted border-bottom-0">
                                                                            Tax</td>
                                                                        <td class="text-end border-bottom-0">
                                                                            @php
                                                                                echo floatval($price) * floatval($quantity) * 0.16;
                                                                            @endphp</td>
                                                                    </tr>
                                                                </tbody>
                                                                <tfoot class="border-bottom border-1">
                                                                    <tr>
                                                                        <th colspan="3"
                                                                            class="text-end font-weight-600">Total</th>
                                                                        <th class="text-end font-weight-600">
                                                                            @php
                                                                                echo floatval($price) * floatval($quantity) - floatval($price) * floatval($quantity) * 0.16;
                                                                            @endphp
                                                                        </th>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="invoice-sign text-end py-5">
                                                <img class="img-fluid d-inline-block" src="theme/coc.png"
                                                    alt="sign">
                                                <span class="d-block">Digital Signature</span>
                                            </div>
                                            <hr>
                                            <div class="invoice-terms">
                                                <h6>Notes:</h6>
                                                <p class="mb-0">Thank you for your business. It is our pleasure to
                                                    work with you. Look forward to working with you again soon!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .Show Modal-Content --> --}}

                {{-- Add Invoice Modal --}}
                <div wire:ignore.self class="modal fade" id="addModal">
                    <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                        <div class="modal-content">
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross-sm"></em>
                            </a>
                            <div class="modal-body modal-body-md">
                                <h5 class="modal-title">Add Invoice</h5>
                                <form wire:submit.prevent="addEmployee" class="mt-2">
                                    @csrf
                                    <div class="row g-gs">

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="form-label" for="order_number">Name</label>
                                                <div class="form-control-wrap">
                                                    <input wire:model="name" type="text"
                                                        class="form-control" id="name"
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
                                                    <input wire:model="email" type="text" class="form-control"
                                                        id="email" placeholder="Enter Item">
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
                                                    <select wire:model="user_type" class="form-control"
                                                        data-search="on">
                                                        <option>Select Position</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="employee">Employee</option>
                                                        <option value="manager">Manager</option>
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
                                                    <select wire:model="department" class="form-control"
                                                        data-search="on">
                                                        <option>Select Department</option>
                                                        @foreach($departments as $department)
                                                        <option value="{{$department->id}}">{{$department->name}}</option>
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
                                                    <select wire:model="gender" class="form-control"
                                                        data-search="on">
                                                        <option>Select Gender</option>
                                                        <option value="male">Male
                                                        </option>
                                                        <option value="female">Female</option>
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
        </div>
    </div>
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
