$('#jumlah_anggota').on('change', function (e) {
    // Jumlah inputan anggota saat ini
    let domCount = $("div[id^='anggota-wrap-'").length

    // Kalau pilihan 0, hapus semuanya
    if (this.value == 0) {
        $('[id^=anggota-wrap-]').remove()
    }

    // Kalau input yang ditampilan < yang dipilih
    if (domCount < this.value) {
        for (i = domCount; i < this.value; ++i) {
            // Increment jumlah inputan anggota
            ++domCount

            // Tambahkan set element berikut kedalam div 'anggota'
            $('#anggota').append(`
        <div id="anggota-wrap-${domCount}" class="form-group row">
          <label class="col-sm-2 col-form-label">Anggota ${domCount}</label>
          <div class="col-sm-4">
            <input type="text" placeholder="NIM Anggota ${domCount}" name='member[${domCount}][nim]' class="form-control" required minlength="3" maxlength="100">
            <div class="invalid-feedback">
              Masukkan nim anggota ke-${domCount}
            </div>
          </div>
          <div class="col-sm-6">
            <input type="text" placeholder="Nama Anggota ${domCount}" name='member[${domCount}][name]' class="form-control" required minlength="3" maxlength="100">
            <div class="invalid-feedback">
              Masukkan nama anggota ke-${domCount}
            </div>
          </div>
        </div>
      `)
        }
    }
    // Kalau input yang ditampilan > yang dipilih
    else if (domCount > this.value) {
        for (i = domCount; i > this.value; --i) {
            $('#anggota-wrap-' + domCount).remove()
        }
    }
})

// Reset status "active" button setelah berpindah tab
$('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    $(this).removeClass('active')
})
