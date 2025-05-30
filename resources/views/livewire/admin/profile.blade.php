<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="card card-bordered">
                    @if($user!=NULL)
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Personal Information</h4>
                                    <div class="nk-block-des">
                                        <p>Basic info, about you.</p>
                                    </div>
                                </div>
                                <div class="nk-block-head-content align-self-start d-lg-none"><a href="#"
                                        class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em
                                            class="icon ni ni-menu-alt-r"></em></a></div>
                            </div>
                        </div>
                        <div class="nk-block">
                            <div class="nk-data data-list">
                                <div class="data-head">
                                    <h6 class="overline-title">Basics</h6>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col"><span class="data-label">Employee Id</span><span
                                            class="data-value">{{ strtoupper($user->employee_id) }}
                                        </span></div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col"><span class="data-label">Full Name</span><span
                                            class="data-value">{{ $user->user->name }}
                                        </span></div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col"><span class="data-label">Department</span><span
                                            class="data-value">{{ $user->dept->name }}</span>
                                    </div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item">
                                    <div class="data-col"><span class="data-label">Email</span><span
                                            class="data-value">{{ $user->user->email }}</span></div>
                                    <div class="data-col data-col-end"><span class="data-more disable"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col"><span class="data-label">Sex</span><span
                                            class="data-value text-soft">{{ ucfirst($user->gender) }}
                                        </span></div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                    <div class="data-col"><span class="data-label">Position</span><span
                                            class="data-value">{{ ucfirst($user->user->user_type) }}
                                        </span></div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                                <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                                    data-tab-target="#address">
                                    <div class="data-col"><span class="data-label">Leave Days Remaining</span><span
                                            class="data-value">{{ $user->available_days == 0 && $user->leave_taken == 0 ? $user->days : $user->available_days  }}
                                        </span></div>
                                    <div class="data-col data-col-end"><span class="data-more"><em
                                                class="icon ni ni-forward-ios"></em></span></div>
                                </div>
                            </div>
                           @else
                            <div class="card-inner card-inner-lg">
                                <div class="nk-block-head nk-block-head-lg">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title">Personal Information</h4>
                                            <div class="nk-block-des">
                                                <p>Basic info, like your name and address, that you use on Nio Platform.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="nk-block-head-content align-self-start d-lg-none"><a href="#"
                                                class="toggle btn btn-icon btn-trigger mt-n1"
                                                data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block">
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Basics</h6>
                                        </div>
                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Full Name</span><span
                                                    class="data-value">Abu Bin Ishtiyak</span></div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div>
                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Display Name</span><span
                                                    class="data-value">Ishtiyak</span></div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Email</span><span
                                                    class="data-value">info@softnio.com</span></div>
                                            <div class="data-col data-col-end"><span class="data-more disable"><em
                                                        class="icon ni ni-lock-alt"></em></span></div>
                                        </div>
                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Phone Number</span><span
                                                    class="data-value text-soft">Not add yet</span></div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div>
                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit">
                                            <div class="data-col"><span class="data-label">Date of Birth</span><span
                                                    class="data-value">29 Feb, 1986</span></div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div>
                                        <div class="data-item" data-bs-toggle="modal" data-bs-target="#profile-edit"
                                            data-tab-target="#address">
                                            <div class="data-col"><span class="data-label">Address</span><span
                                                    class="data-value">2337 Kildeer Drive,<br>Kentucky, Canada</span>
                                            </div>
                                            <div class="data-col data-col-end"><span class="data-more"><em
                                                        class="icon ni ni-forward-ios"></em></span></div>
                                        </div>
                                    </div>
                                    <div class="nk-data data-list">
                                        <div class="data-head">
                                            <h6 class="overline-title">Preferences</h6>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Language</span><span
                                                    class="data-value">English (United State)</span></div>
                                            <div class="data-col data-col-end"><a href="#"
                                                    class="link link-primary">Change Language</a></div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Date Format</span><span
                                                    class="data-value">M d, YYYY</span></div>
                                            <div class="data-col data-col-end"><a href="#"
                                                    class="link link-primary">Change</a></div>
                                        </div>
                                        <div class="data-item">
                                            <div class="data-col"><span class="data-label">Timezone</span><span
                                                    class="data-value">Bangladesh (GMT +6)</span></div>
                                            <div class="data-col data-col-end"><a href="#"
                                                    class="link link-primary">Change</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
