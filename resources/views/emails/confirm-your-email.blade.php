@component('mail::message')
# One more step before join our screencast

we nee u to confirm your email

@component('mail::button', ['url' => route('confirm-email') . '?token=' .$user->confirm_token])
Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
