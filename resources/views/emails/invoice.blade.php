@component('mail::message', ['logo' => getConfig('email-logo')])
# Invoice **#{{ $data['invoice']['id'] }}**

Yth, {{ $data['attendee']['name'] }}.  
Terima Kasih Anda telah melakukan pembelian E-Ticket {{ config('app.name') }}.
Mohon untuk segera menyelesaikan pembelian Anda dengan:
1. Membayar harga tiket **{{ $data['ticket'] }}** sejumlah **{{ $data['invoice']['amount'] }}** sebelum **{{ $data['invoice']['due'] }}** melalui:
    - {{ $data['method']['name'] }}: {{ $data['method']['number'] }} (a.n. {{ $data['method']['holder'] }})
2. Apabila Anda melakukan transfer, mohon untuk segera melakukan konfirmasi melalui tombol konfirmasi dibawah dengan menyertakan
nomor referensi anda yaitu **#{{ $data['invoice']['id'] }}**, dan menyertakan bukti transfer.
3. Kami akan segera mengkonfirmasi pembayaran Anda disaat hari dan jam kerja (08.00-16:00).
4. Jika telah terkonfirmasi, Anda akan segera mendapat email E-Ticket yang dapat Anda 
gunakan untuk mengikuti event dan mengakses berbagai fasilitas yang diberikan oleh tiket Anda.

@component('mail::button', ['url' => $data['invoice']['confirmation_url']])
Konfirmasi Pembayaran
@endcomponent
  
Terima Kasih,  
{{ config('app.name') }}  

@endcomponent
