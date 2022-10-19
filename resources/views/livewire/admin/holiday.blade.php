<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-aside-wrap">
                            <div class="card-inner bg-lighter card-inner-lg">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Holidays</h3>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1"
                                                    data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        <li>
                                                            <div class="form-control-wrap">
                                                                <div class="form-icon form-icon-right">
                                                                    <em class="icon ni ni-search"></em>
                                                                </div>
                                                                <input type="text" class="form-control"
                                                                    id="default-04" placeholder="Quick search by id">
                                                            </div>
                                                        </li>
                                                        <div class="card-tools">
                                                            <a href="#" class="btn btn-md btn-primary"
                                                                data-toggle="modal" data-target="#addModal"><em
                                                                    class="icon ni ni-plus"></em>
                                                                <span>Add Holiday</span>
                                                            </a>
                                                        </div>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="oid">
                                                    <label class="custom-control-label" for="oid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col"><span>Holiday Name</span></div>
                                            <div class="nk-tb-col tb-col-md"><span>Date</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li>
                                                        <div class="drodown">
                                                            <a href="#"
                                                                class="dropdown-toggle btn btn-icon btn-trigger mr-n1"
                                                                data-toggle="dropdown"><em
                                                                    class="icon ni ni-more-h"></em></a>
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
                                        </div><!-- .nk-tb-item -->
                                        @foreach($holidays as $holiday)
                                        <div class="nk-tb-item">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="oid01">
                                                    <label class="custom-control-label" for="oid01"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col">
                                                <div class="user-card">
                                                    <div class="user-avatar sm bg-purple">
                                                        <span>
                                                            <?php
                                                            $name= $holiday->name;
                                                            preg_match_all('/\b\w/',$name, $name);
                                                            echo strtoupper(join('', $name[0]));
                                                            ?></span>
                                                    </div>
                                                    <div class="user-name">
                                                        <span class="tb-lead">{{$holiday->name}}<a href="#"></a></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-md">
                                                <span class="tb-sub text-primary">{{$holiday->date}}</span>
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
                                                                <li><a href="#deleteHoliday"
                                                                        wire:click.prevent="delete({{ $holiday->id }})">Delete</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div><!-- .nk-tb-list -->
                                    <div class="card">
                                        <div class="card-inner">
                                            <div class="nk-block-between-md g-3">
                                                <div class="g">
                                                    <ul>
                                                        {{ $holidays->links() }}

                                                    </ul><!-- .pagination -->
                                                </div>
                                            </div><!-- .nk-block-between -->
                                        </div>
                                    </div>
                                </div><!-- .nk-block -->

                            </div>
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>
    {{-- Add Dob Modal --}}
    <div wire:ignore.self class="modal fade" id="addModal">
        <div class="modal-dialog modal-lg modal-dialog-top" role="document">
            <div class="modal-content">
                <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                    <em class="icon ni ni-cross-sm"></em>
                </a>
                <div class="modal-body modal-body-md">
                    <h5 class="modal-title">Add Holiday</h5>
                    <form wire:submit.prevent="addHoliday" class="mt-2">
                        <div class="row g-gs">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="oder-id">Holiday Name</label>
                                    <div class="form-control-wrap">
                                        <input wire:model="name" type="text" class="form-control" id="oder-id"
                                            placeholder="Enter Holiday Name">
                                    </div>
                                    @error('name')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label" for="order-id">Date</label>
                                    <div class="form-control-wrap">
                                        <input wire:model="date" type="date" class="form-control" id="order-id"
                                            placeholder="Enter Police Ref">
                                    </div>
                                    @error('date')
                                        <div class="form-note text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">
                                    <div wire:loading wire:target='addHoliday'>
                                    </div>Add
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- .Add Modal-Content -->
</div>

@push('scripts')
@endpush
