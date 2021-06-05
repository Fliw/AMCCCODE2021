$(document).ready(function() {
    $('#tim_nama').focusout(function() {
        if ($('#tim_nama').val().length <= 3) {
            $('#errorValidate').html("maaf nama tim minimal 4 karakter");
            $('#errorValidate').css('display', 'block');
        } else {
            $('#errorValidate').css('display', 'none');
        }
    });
    $('#tim_institusi').focusout(function() {
        if ($('#tim_institusi').val().length < 6) {
            $('#errorValidate').html("maaf nama institusi minimal 6 karakter");
            $('#errorValidate').css('display', 'block');
        } else {
            $('#errorValidate').css('display', 'none');
        }
    });
    $('#tim_kategori').change(function() {
        $('#to-step-2').removeClass('disabled');
    });


    $("#ketua_nim").keyup(function() {
        if ($('#ketua_nim').val().length <= 3) {
            $('#errorValidate2').html("maaf nim ketua minimal 4 karakter");
            $('#errorValidate2').css('display', 'block');
        } else {
            $('#errorValidate2').css('display', 'none');
        }
    });
    $("#ketua_nama").keyup(function() {
        if ($('#ketua_nama').val().length < 6) {
            $('#errorValidate2').html("maaf nama ketua minimal 6 karakter");
            $('#errorValidate2').css('display', 'block');
        } else {
            $('#errorValidate2').css('display', 'none');
        }
    });
    $("#ketua_wa").keyup(function() {
        if ($('#ketua_wa').val().length < 9) {
            $('#errorValidate2').html("maaf nomor whatsapp minimal 10 karakter");
            $('#errorValidate2').css('display', 'block');
        } else {
            $('#errorValidate2').css('display', 'none');
        }
    });

    $('#jumlah_anggota').on('change', function(e) {
        let formMemberData = $("div[id^='anggota-wrap-'").length;
        let formMember = []
        let formMemberPass = false;
        $("input[name^='member']").keyup(function() {
            for (i = 1; i <= formMemberData; i++) {
                let nim = $(`input[name="member[${i}][nim]"]`).val().length;
                let name = $(`input[name="member[${i}][name]"]`).val().length;

                if (nim >= 3 && name >= 6) {
                    formMember[i - 1] = true;
                    $('#errorValidate2').css('display', 'none');
                } else {
                    formMember[i - 1] = false
                    $('#errorValidate2').html("maaf nama member minimal 6 karakter dan nim minimal 3 karakter");
                    $('#errorValidate2').css('display', 'block');
                    $('#to-step-3').addClass('disabled');
                }
            }

            if (formMember.length > 0 && formMember.indexOf(false) == -1) {
                formMemberPass = true;
                $('#to-step-3').removeClass('disabled');
            } else {
                formMemberPass = false;
            }
        });
    })

    $('#third_email').keyup(function() {
        if ($('#third_email').val().length < 6) {
            $('#errorValidate3').html("maaf email minimal 6 karakter");
            $('#errorValidate3').css('display', 'block');
            $('#submit').addClass('disabled');
        } else {
            $('#errorValidate3').css('display', 'none');
        }
    });

    $('#third_password').keyup(function() {
        if ($('#third_password').val().length < 6) {
            $('#errorValidate3').html("maaf password minimal 6 karakter");
            $('#errorValidate3').css('display', 'block');
            $('#submit').addClass('disabled');
        } else {
            $('#errorValidate3').css('display', 'none');
        }
    });
    $('#third_confirm').keyup(function() {
        if ($('#third_confirm').val() != $('#third_password').val()) {
            $('#errorValidate3').html("maaf konfirmasi password tidak sesuai");
            $('#errorValidate3').css('display', 'block');
            $('#submit').addClass('disabled');
        } else {
            $('#errorValidate3').css('display', 'none');
            $('#submit').removeClass('disabled');
        }
    });
});

function validateStep3() {
    let formEmail = $('#third_email').val().length;
    let formPassword = $('#third_password').val();
    let formPasswordConfirm = $('#third_confirm').val();

    if (formEmail >= 6 && formPassword.length >= 6 && formPasswordConfirm.length >= 6 && (formPassword === formPasswordConfirm)) {
        $('#submit').removeClass('disabled');
    } else {
        $('#submit').addClass('disabled');
    }
}


$('#jumlah_anggota').on('change', function(e) {
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
$('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
    $(this).removeClass('active')
})