<div class="nk-content ">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Rejected Leave Requests</h3>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner position-relative card-tools-toggle">
                        <div class="card-title-group">
                            <div class="card-tools">
                            </div><!-- .card-tools -->
                            <div class="card-tools mr-n1">
                                <ul class="btn-toolbar gx-1">
                                    <li>
                                        <a href="#" class="btn btn-icon search-toggle toggle-search"
                                            data-target="search"><em class="icon ni ni-search"></em></a>
                                    </li><!-- li -->
                                    <li class="btn-toolbar-sep"></li><!-- li -->
                                    <li>
                                        <div class="toggle-wrap">
                                            <a href="#" class="btn btn-icon btn-trigger toggle"
                                                data-target="cardTools"><em class="icon ni ni-menu-right"></em></a>
                                            <div class="toggle-content" data-content="cardTools">
                                                <ul class="btn-toolbar gx-1">
                                                    <li class="toggle-close">
                                                        <a href="#" class="btn btn-icon btn-trigger toggle"
                                                            data-target="cardTools"><em
                                                                class="icon ni ni-arrow-left"></em></a>
                                                    </li><!-- li -->
                                                    <li>
                                                        <div class="dropdown">
                                                            <a href="#"
                                                                class="btn btn-trigger btn-icon dropdown-toggle"
                                                                data-toggle="dropdown">
                                                                <em class="icon ni ni-setting"></em>
                                                            </a>
                                                            <div
                                                                class="dropdown-menu dropdown-menu-xs dropdown-menu-right">
                                                                <ul class="link-check">
                                                                    <li><span>Show</span></li>
                                                                    <li class="{{($pages==10) ? 'active' : ''}}"><a href="#" wire:click.prevent="$set('pages', 10)">10</a></li>
                                                                    <li class="{{($pages==20) ? 'active' : ''}}"><a href="#" wire:click.prevent="$set('pages', 20)">20</a></li>
                                                                    <li class="{{($pages==50) ? 'active' : ''}}"><a href="#"wire:click.prevent="$set('pages', 50)">50</a></li>
                                                                </ul>
                                                                <ul class="link-check">
                                                                    <li><span>Order</span></li>
                                                                    <li class="{{($order=='DESC') ? 'active' : ''}}"><a href="#" wire:click.prevent="$set('order', 'DESC')">DESC</a></li>
                                                                    <li class="{{($order=='ASC') ? 'active' : ''}}"><a href="#" wire:click.prevent="$set('order', 'ASC')">ASC</a></li>
                                                                </ul>
                                                            </div>
                                                        </div><!-- .dropdown -->
                                                    </li><!-- li -->
                                                </ul><!-- .btn-toolbar -->
                                            </div><!-- .toggle-content -->
                                        </div><!-- .toggle-wrap -->
                                    </li><!-- li -->
                                </ul><!-- .btn-toolbar -->
                            </div><!-- .card-tools -->
                        </div><!-- .card-title-group -->
                        <div class="card-search search-wrap" data-search="search">
                            <div class="card-body">
                                <div class="search-content">
                                    <a href="#" class="search-back btn btn-icon toggle-search"
                                        data-target="search"><em class="icon ni ni-arrow-left"></em></a>
                                    <input wire:model="search" type="text" class="form-control border-transparent form-focus-none"
                                        placeholder="Search by user or email">
                                    <button class="search-submit btn btn-icon"><em
                                            class="icon ni ni-search"></em></button>
                                </div>
                            </div>
                        </div><!-- .card-search -->
                    </div><!-- .card-inner -->
                    <div class="card-inner p-0">
                        <div class="nk-tb-list nk-tb-ulist is-compact">
                            <div class="nk-tb-item nk-tb-head">
                                <div class="nk-tb-col nk-tb-col-check">
                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                        <input type="checkbox" class="custom-control-input" id="uid">
                                        <label class="custom-control-label" for="uid"></label>
                                    </div>
                                </div>
                                <div class="nk-tb-col"><span class="sub-text">Name</span></div>
                                <div class="nk-tb-col tb-col-md"><span class="sub-text">Date From</span></div>
                                <div class="nk-tb-col tb-col-sm"><span class="sub-text">Date To</span></div>
                                <div class="nk-tb-col tb-col-sm"><span class="sub-text">Applied Days</span>
                                </div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Department</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Type</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Status</span></div>
                                <div class="nk-tb-col tb-col-lg"><span class="sub-text">Date Declined</span></div>
                                <div style="text-align: end" class="nk-tb-col tb-col-lg"><span>Remarks</span></div>

                            </div><!-- .nk-tb-item -->
                            @foreach ($leaves as $leave)
                                <div class="nk-tb-item">
                                    <div class="nk-tb-col nk-tb-col-check">
                                        <div class="custom-control custom-control-sm custom-checkbox notext">
                                            <input type="checkbox" class="custom-control-input" id="uid1">
                                            <label class="custom-control-label" for="uid1"></label>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <div class="user-card">
                                            <div class="user-avatar xs bg-primary">
                                                <span> <?php
                                                $name = $leave->user->name;
                                                preg_match_all('/\b\w/', $name, $name);
                                                echo strtoupper(join('', $name[0]));
                                                ?></span>
                                            </div>
                                            <div class="user-name">
                                                <span class="tb-lead">{{ $leave->user->name }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="nk-tb-col">
                                        <span>{{ $leave->date_start }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{ $leave->date_end }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-sm">
                                        <span>{{ $leave->nodays }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{ array_search($leave->employee->department, $departments->pluck('id', 'name')->toArray()) }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{ array_search($leave->leave_type, $types->pluck('id', 'name')->toArray()) }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span class="badge tb-status text-danger">{{ ucfirst($leave->status) }}</span>
                                    </div>
                                    <div class="nk-tb-col tb-col-md">
                                        <span>{{ date('Y/m/d') }}</span>
                                    </div>
                                    <div class="nk-tb-col nk-tb-col-tools">
                                        <ul class="nk-tb-actions gx-1">
                                            <div class="drodown mr-n1">
                                                <a href="#"
                                                    class="dropdown-toggle btn btn-icon btn-trigger"
                                                    data-toggle="dropdown"><em
                                                        class="icon ni ni-more-h"></em></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <ul class="link-list-opt no-bdr">
                                                        <li><a href="#"
                                                                wire:click="showRemarks({{ $leave->id }})"
                                                                data-toggle="modal"
                                                                data-target="#viewModal"><span>View
                                                                    Remarks</span></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            @endforeach
                        </div><!-- .nk-tb-list -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <ul class="pagination justify-content-center justify-content-md-start">
                            {{ $leaves->links() }}
                        </ul><!-- .pagination -->
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- .card -->
        </div>
    </div>
    <div wire:ignore.self class="modal fade" id="viewModal">
        <div class="modal-dialog modal-lg modal-dialog-top" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="oder-id">Remarks</label>
                                    <div class="form-control-wrap">
                                        <textarea class="form-control" id="oder-id" readonly>{{ $remarks }}
                                        </textarea>
                                    </div>
                                </div>
                            </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
</div>
