@component('mail::message')
# Job Updated Notification

Hello {{ $job->name }},

This is to inform you that your job details have been updated successfully.

Updated Status: {{ $status }}

@if ($status == 'Requested')
    Site Visit Date: {{ $visitDate }}
@else
    Report ETA: {{ $reportEta }}
@endif

Regards,<br>
{{ config('app.name') }}
@endcomponent