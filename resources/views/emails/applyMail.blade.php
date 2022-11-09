{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Leave Application</title>
</head>
<body>

    <h3>Hello Sir/Madam,</h3><br>
    <p>I would like to inform you of my desire to apply for {{$leave->leave_type_id == 1 ? "an" : "a"}} {{array_search($leave->leave_type_id , $types->pluck('id', 'name')->toArray())}} leave which will begin on {{$leave->date_start}}. </p><br>
    <p>It will run for {{$leave->nodays}} days ending on {{$leave->date_end}}.</p><br>
    <p>Looking foward to your response.</p><br><br>
    <p>Regards,</p>
</body>
</html> --}}
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* Add custom classes and styles that you want inlined here */
    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="card my-10">
            <div class="card-body">
                <h1 class="h3 mb-2">Leave Application</h1>

                <h5 class="text-teal-700">Hello Sir/Madam,</h5>
                <hr>
                <div class="space-y-3">
                    <p class="text-gray-700">I'm writing to ask for {{ $leave->leave_type_id == 1 ? 'an' : 'a' }}
                        {{ array_search($leave->leave_type_id, $types->pluck('id', 'name')->toArray()) }}.
                    </p>
                    <p>
                        I'd like to take my leave between {{ date_format(date_create($leave->date_start), 'l') }}
                        {{ date_format(date_create($leave->date_start), 'jS') }} {{ date_format(date_create($leave->date_start), 'M') }}
                        {{ date_format(date_create($leave->date_start), 'Y') }} and {{ date_format(date_create($leave->date_end), 'l') }}
                        {{ date_format(date_create($leave->date_end), 'jS') }} {{ date_format(date_create($leave->date_end), 'M') }}
                        {{ date_format(date_create($leave->date_end), 'Y') }}.
                    </p>
                    <p>
                        I'll be away for {{ $leave->nodays }} working days, which is in accordance with the company's
                        {{ array_search($leave->leave_type_id, $types->pluck('id', 'name')->toArray()) }} leave policy.
                    </p>
                    <p>
                        I have discussed my absence with my team to cover for me during this time.
                    </p>
                    <p>
                        Thank you for considering the above dates for my leave.
                    </p>
                    <p>
                        <span>Regards,</span><br>
                        <span>{{ $leave->user->name }}</span>
                    </p>
                </div>
                <hr>
            </div>
        </div>
    </div>
</body>

</html>
