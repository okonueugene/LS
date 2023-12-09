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

                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div id="calendar"></div>
                                </div><!-- .nk-block -->

                            </div>
                        </div><!-- .card-aside-wrap -->
                    </div><!-- .card -->
                </div><!-- .nk-block -->
            </div>
        </div>
    </div>

</div>
@push('styles')
    <style>
        /* Add CSS styles for different event types */
        .observance-event {
            text-align: center;
            font-family: Arial;
            font-style: italic;
        }

        .public-event {
            text-align: center;
            font-family: Arial;
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve holidays
            let holidays = <?php echo json_encode($holidays); ?>;

            // Map holidays to FullCalendar events with different classes
            let holidayEvents = holidays.map(holiday => {
                // Determine the event class based on the description
                let eventClass = holiday.description.toLowerCase().includes("observance") ?
                    "observance-event" :
                    "public-event";

                // Return the event object
                return {
                    title: holiday.summary,
                    start: holiday.start_date,
                    end: holiday.end_date,
                    className: eventClass,
                };
            });
            console.log(holidayEvents)
            // Initialize FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: holidayEvents,
            });

            // Render the calendar
            calendar.render();
        });
    </script>
@endpush
