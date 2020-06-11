@component('mail::message', ['logo' => getConfig('email-logo')])
# E-Ticket {{ config('app.name') }}

Terima kasih Anda telah menyelesaikan pembayaran.  
Berikut kami sertakan link untuk mengakses semua acara yang akan Anda ikuti. 
Mohon diperhatikan bahwa acara hanya dapat diakses ketika sudah memasuki waktunya.
  
**Ticket Holder:**  
- Nama Lengkap: {{ $data['attendee']['name'] }}  
- Identitas: {{ $data['attendee']['identity'] }}  
- Asal Institusi: {{ $data['attendee']['institution'] }}

**E-Ticket:**  
- {{ $data['ticket'] }}<br>
  
@component('mail::button', ['url' => $data['entrance_url']])
Akses Acara
@endcomponent
  
Selamat mengikuti semua kegiatannya :)  
  
Terima Kasih,<br>
{{ config('app.name') }}
@endcomponent
