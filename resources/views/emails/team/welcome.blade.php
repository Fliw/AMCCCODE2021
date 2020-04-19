@component('mail::message', ['logo' => getConfig('email-logo')])
# Selamat datang para Innovator!

Hai, {{ $data['team']['name'] }}.  
Kata-kata motivasi disini...
    
Terima Kasih,  
{{ config('app.name') }}  

@endcomponent
