@component('mail::message')
# Set Password For {{ ucwords($user->name) }}

Please click the link below to set your password

@component('mail::button', ['url' => route('users.set_password', ['token' => $user->password_set_token]), 'color' => 'darkGreen'])
Set Password
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
