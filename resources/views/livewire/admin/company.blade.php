<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Company Management</h3>
                            <div class="nk-block-des text-soft">
                                <p>You can add, delete or suspend company.</p>
                            </div>
                        </div><!-- .nk-block-head-content -->
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                    data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                <div class="toggle-expand-content" data-content="pageMenu">
                                    <ul class="nk-block-tools g-3">
                                        <li><a href="#"
                                                class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                                                    class="icon ni ni-arrow-left"></em><span>Go Back</span></a></li>
                                        <li><button class="btn btn-secondary" data-toggle="modal"
                                                data-target="#addModal"><em class="icon ni ni-link"></em><span>Add
                                                    Company</span></button></li>
                                    </ul>
                                </div>
                            </div><!-- .toggle-wrap -->
                        </div><!-- .nk-block-head-content -->
                    </div><!-- .nk-block-between -->
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered card-preview">
                        @if (count($companies) > 0)
                            <table class="table table-tranx">
                                <thead>
                                    <tr class="tb-tnx-head">
                                        <th class="tb-tnx-info">
                                            <span class="tb-tnx-desc d-none d-sm-inline-block">
                                                <span>Company Name</span>
                                            </span>
                                        </th>
                                        <th class="tb-tnx-id"><span class="">Comapny Email</span>
                                        </th>
                                        <th class="tb-tnx-amount">
                                            <span class="tb-tnx-total">Registered At</span>
                                            <span class="tb-tnx-status d-none d-md-inline-block">Status</span>
                                        </th>
                                        <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
                                </thead>
                                <tbody>
                                    @foreach ($companies as $company)
                                        <tr class="tb-tnx-item">
                                            <td class="tb-tnx-info">
                                                <div class="">
                                                    <span class="title">{{ $company->company_name }}</kbd></span>
                                                </div>
                                            </td>
                                            <td class="tb-tnx-id">
                                                <span>{{ $company->company_email }}</span>
                                            </td>
                                            <td class="tb-tnx-amount">
                                                <div class="tb-tnx-total">
                                                    <span
                                                        class="amount">{{ date('d-m-Y', strtotime($company->created_at)) }}</span>
                                                </div>
                                                <div class="tb-tnx-status">
                                                    @if ($company->status == true)
                                                        <span class="badge badge-dot badge-success">Active</span>
                                                    @else
                                                        <span class="badge badge-dot badge-danger">Deactivated</span>
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="tb-col-action">
                                                <button data-toggle="modal" data-target="#updateCompany"
                                                    wire:click.prevent='showCompany({{ $company->id }})' wire
                                                    class="btn btn-success btn-sm">Update</button>
                                                <button wire:click.prevent='disableCompany({{ $company->id }})'
                                                    class="btn btn-danger btn-sm">Disable</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-fill alert-icon alert-gray" role="alert">
                                <em class="icon ni ni-alert-circle"></em>
                                No available companies
                            </div>
                        @endif
                    </div><!-- .card-preview -->
                    @if (!empty($companies))
                        <div class="card card-preview">
                            <div class="card-inner">
                                {{ $companies->links() }}
                            </div>
                        </div>
                    @endif
                </div><!-- nk-block -->
            </div>


            <!-- Add company Modal -->
            <div wire:ignore.self class="modal fade" tabindex="-1" id="addModal">
                <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add a Company</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Enter Company Name</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-mail"></em>
                                            </div>
                                            <input wire:model="name" type="text" class="form-control name"
                                                name="name" id="default-04" placeholder="Enter company name">
                                        </div>
                                        @error('name')
                                            <div class="form-note text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Enter Company Email</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-mail"></em>
                                            </div>
                                            <input wire:model="email" type="email" class="form-control email"
                                                name="email" id="default-04"
                                                placeholder="Enter company email address">
                                        </div>
                                        @error('email')
                                            <div class="form-note text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="customFileLabel">Select Logo</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" wire:model='logo' class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('logo')
                                                <div class="form-note text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button wire:click='addCompany' class="btn btn-warning inviteMember"><em
                                            class="icon ni ni-mail"></em><span>Add Company</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <span class="sub-text">Company Limited</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- update company Modal -->
            <div wire:ignore.self class="modal fade" tabindex="-1" id="updateCompany">
                <div class="modal-dialog modal-lg modal-dialog-top" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update company details</h5>
                            <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body">
                            <div class="row gy-4">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Company Name</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-mail"></em>
                                            </div>
                                            <input wire:model="name" type="text" class="form-control name" value="{{ $name }}"
                                                name="name" id="default-04" placeholder="Enter company name">
                                        </div>
                                        @error('name')
                                            <div class="form-note text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="form-label">Company Email</label>
                                        <div class="form-control-wrap">
                                            <div class="form-icon form-icon-right">
                                                <em class="icon ni ni-mail"></em>
                                            </div>
                                            <input wire:model="email" type="email" class="form-control email"
                                                name="email" value="Testsee"
                                                placeholder="Enter company email address">
                                        </div>
                                        @error('email')
                                            <div class="form-note text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="form-label" for="customFileLabel">Select Logo</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" wire:model='logo' class="custom-file-input"
                                                    id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            @error('logo')
                                                <div class="form-note text-danger mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <button wire:click='updateCompany({{ $company_id }})' class="btn btn-warning inviteMember"><em
                                            class="icon ni ni-mail"></em><span>Update Company</span></button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <span class="sub-text">{{$company->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
