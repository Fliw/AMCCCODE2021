@component('mail::message', ['logo' => getConfig('email-logo')])
# E-Ticket {{ config('app.name') }}

Terima kasih Anda telah menyelesaikan pembayaran.  
Berikut kami lampirkan kode QR E-Ticket Anda. Mohon untuk menyimpan email ini 
dan tunjukkan email dan kode QR ini kepada panitia setiap ingin memasuki ruangan 
sebagai presensi dan bukti bahwa Anda mempunyai akses ke acara tersebut.
  
**Ticket Holder:**  
- Nama Lengkap: {{ $data['attendee']['name'] }}  
- Identitas: {{ $data['attendee']['identity'] }}  
- Asal Institusi: {{ $data['attendee']['institution'] }}

**E-Ticket:**  
- {{ $data['ticket'] }}<br>
  
{{-- TODO: Extract this as a reusable component --}}
<table class="panel" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<hr>
<img src="https://chart.googleapis.com/chart?cht=qr&chld=H|0&chs={{ $data['qr']['dimension'] }}x{{ $data['qr']['dimension'] }}&chl={{ $data['qr']['code'] }}">
<hr>
</table>
  
Selamat mengikuti semua kegiatannya :)  
  
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
