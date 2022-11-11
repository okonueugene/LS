<div class="nk-content ">
    <div class="nk-content-body">
        <div class="nk-block-head nk-block-head-sm">
            <div class="nk-block-between">
                <div class="nk-block-head-content">
                    <h3 class="nk-block-title page-title">Apply For Leave</h3>
                </div>
            </div>
        </div>
        <div class="nk-block">
            <div class="card card-bordered card-stretch">
                <div class="card-inner-group">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Leave Application Form</h5>
                        </div>
                        @if($user->employee != NULL)
                        <form wire:submit.prevent="applyLeave" class="mt-2">
                            <div class="form-group"><label class="form-label" for="cf-full-name">Full
                                    Name</label><input type="text" class="form-control" id="cf-full-name"
                                    value="{{ $user->name }}"readonly>
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-email-address">Employee Id
                                </label><input type="text" class="form-control" id="cf-email-address"
                                    value="{{ strtoupper($user->employee->employee_id) }}"readonly>
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-phone-no">
                                    Available Leave Days</label><input type="text" class="form-control"
                                    id="cf-phone-no" value="{{ $user->employee->days-$user->employee->leave_taken }}"readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-full-name">Leave Type
                                </label>
                                <select wire:model="leave_type_id" class="form-control" data-search="on">
                                    <option>Select Leave Type</option>
                                    @foreach ($leavetypes as $leavetype)
                                        <option value="{{ $leavetype->id }}">{{ $leavetype->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('leave_type_id')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-subject">From</label>
                                <input wire:model="date_start" type="date" class="form-control" id="cf-subject">
                                @error('date_start')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-subject">To</label>
                                <input wire:model="date_end" type="date" class="form-control" id="cf-subject">
                                @error('date_end')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-default-textarea">Comments</label>
                                <div class="form-control-wrap">
                                    <textarea wire:model="reason" class="form-control form-control-sm" id="cf-default-textarea"
                                        placeholder="Write your message">
                                    </textarea>
                                </div>
                                @error('reason')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary">
                                    <div wire:loading wire:target='applyLeave'>
                                    </div>Apply
                                </button>
                            </div>
                        </form>
                        @else
                        <form wire:submit.prevent="applyLeave" class="mt-2">
                            <div class="form-group"><label class="form-label" for="cf-full-name">Full
                                    Name</label><input type="text" class="form-control" id="cf-full-name"
                                    value="{{ $user->name }}"readonly>
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-email-address">Employee Id
                                </label><input type="text" class="form-control" id="cf-email-address"
                                    value="1"readonly>
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-phone-no">
                                    Available Leave Days</label><input type="text" class="form-control"
                                    id="cf-phone-no" value="21"readonly>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-full-name">Leave Type
                                </label>
                                <select wire:model="leave_type_id" class="form-control" data-search="on">
                                    <option>Select Leave Type</option>
                                    @foreach ($leavetypes as $leavetype)
                                        <option value="{{ $leavetype->id }}">{{ $leavetype->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('leave_type_id')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-subject">From</label>
                                <input wire:model="date_start" type="date" class="form-control" id="cf-subject">
                                @error('date_start')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-subject">To</label>
                                <input wire:model="date_end" type="date" class="form-control" id="cf-subject">
                                @error('date_end')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="cf-default-textarea">Comments</label>
                                <div class="form-control-wrap">
                                    <textarea wire:model="reason" class="form-control form-control-sm" id="cf-default-textarea"
                                        placeholder="Write your message">
                                    </textarea>
                                </div>
                                @error('reason')
                                    <div class="form-note text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-secondary" onclick="window.location.href='{{url()->previous()}}'">
                                    <div wire:loading wire:target='applyLeave' >
                                    </div>Apply
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
