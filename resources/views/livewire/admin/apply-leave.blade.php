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
                        <form action="#">
                            <div class="form-group"><label class="form-label" for="cf-full-name">Full
                                    Name</label><input type="text" class="form-control" id="cf-full-name" value="{{$user->name}}"readonly>
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-email-address">Employee Id
                                </label><input type="text" class="form-control" id="cf-email-address" value="{{isset($user->details->employee_id)}}"readonly>
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-phone-no">
                                    Available Leave Days</label><input type="text" class="form-control"
                                    id="cf-phone-no" value="{{isset($user->details->available_days)}}"readonly>
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-subject">From</label><input
                                    type="date" class="form-control" id="cf-subject">
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-subject">To</label><input
                                    type="date" class="form-control" id="cf-subject">
                            </div>
                            <div class="form-group"><label class="form-label" for="cf-default-textarea">Comments</label>
                                <div class="form-control-wrap">
                                    <textarea class="form-control form-control-sm" id="cf-default-textarea" placeholder="Write your message"></textarea>
                                </div>
                            </div>
                            <div class="form-group"><button type="submit" class="btn btn-lg btn-primary">Apply
                                </button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
