<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const loadingScreen = document.getElementById('loading-screen');

        // Tambahkan delay sebelum menghilangkan loading screen
        setTimeout(function() {
            loadingScreen.style.opacity = '0'; // Menambahkan efek fade out
            setTimeout(function() {
                loadingScreen.style.display = 'none';
            }, 500); // Menyembunyikan elemen setelah efek fade out selesai
        }, 2000); // Ubah nilai ini untuk menyesuaikan durasi (2000ms = 2 detik)
    });
    $('#form-contact').submit(function(event) {
        event.preventDefault();

        let submitButton = $('#submit-button-contact');
        let spinner = submitButton.find('.spinner-border');

        // Tampilkan spinner dan nonaktifkan button
        submitButton.prop('disabled', true);
        spinner.show();

        let formData = new FormData(this);

        $.ajax({
            url: '{{ route('kontak.store') }}',
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                let message = response.message;
                $('#form-contact').trigger('reset');

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: message,
                    showConfirmButton: false,
                    timer: 1500,
                    toast: true,
                });

                // Sembunyikan spinner dan aktifkan kembali button
                submitButton.prop('disabled', false);
                spinner.hide();
                $.ajax({
                type: 'GET',
                url: '/reload-captcha', // Pastikan rutenya benar
                success: function(data) {
                    // Update elemen dengan ID 'captcha' dengan CAPTCHA baru
                    $("#captcha1").html(data.captcha);

                    // Setelah CAPTCHA berhasil dimuat, sembunyikan tombol loading dan tampilkan tombol reload
                    $('#loading-btn1').hide();
                    $('#reload1').show();
                },
                error: function() {
                    // Jika terjadi kesalahan, tetap tampilkan tombol reload dan sembunyikan tombol loading
                    $('#loading-btn1').hide();
                    $('#reload1').show();
                }
            });
            },
            error: function(error) {
                if (error.responseJSON.errors) {
                    const errors = error.responseJSON.errors;
                    let errorMessage = '';

                    $.each(errors, function(key, value) {
                        $('#' + key).addClass('is-invalid');
                        $('#' + key + '_error').text(value[0]);
                        errorMessage += value[0] + '<br>';
                    });

                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        html: errorMessage,
                        showConfirmButton: false,
                        timer: 1500,
                        toast: true,
                    });
                }

                // Sembunyikan spinner dan aktifkan kembali button
                submitButton.prop('disabled', false);
                spinner.hide();
            }
        });
    });
    $(document).ready(function() {
        const owlCarouselSettings = {
            loop: true,
            margin: 30,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2500,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                },
                600: {
                    items: 2,
                    nav: false,
                },
                1000: {
                    items: 3,
                    nav: false,
                },
            },
        };

        $('#mitra-carousel').owlCarousel(owlCarouselSettings);
        $('#klien-carousel').owlCarousel(owlCarouselSettings);
    });
    $(function() {
        $('#reload1').click(function() {
            // Sembunyikan tombol reload dan tampilkan tombol loading
            $('#reload1').hide();
            $('#loading-btn1').show();

            // Lakukan AJAX request untuk reload CAPTCHA
            $.ajax({
                type: 'GET',
                url: '/reload-captcha', // Pastikan rutenya benar
                success: function(data) {
                    // Update elemen dengan ID 'captcha' dengan CAPTCHA baru
                    $("#captcha1").html(data.captcha);

                    // Setelah CAPTCHA berhasil dimuat, sembunyikan tombol loading dan tampilkan tombol reload
                    $('#loading-btn1').hide();
                    $('#reload1').show();
                },
                error: function() {
                    // Jika terjadi kesalahan, tetap tampilkan tombol reload dan sembunyikan tombol loading
                    $('#loading-btn1').hide();
                    $('#reload1').show();
                }
            });
        });
    });


    // $(document).ready(function() {
    //         $('#klien-carousel').owlCarousel({
    //             loop: true,
    //             margin: 10,
    //             responsiveClass: true,
    //             dots: false,
    //             autoplay: true,
    //             autoplayTimeout: 2500,
    //             autoplayHoverPause: true,
    //             responsive: {
    //                 0: {
    //                     items: 2,
    //                     nav: false,
    //                 },
    //                 600: {
    //                     items: 4,
    //                     nav: false,
    //                 },
    //                 1000: {
    //                     items: 6,
    //                     nav: false,
    //                 }
    //             }
    //         });
    //     });
</script>
{{-- <script>
    function scrollUp() {
        const scrollUp = document.getElementById('scroll-up');
        // When the scroll is higher than 560 viewport height, add the show-scroll class to the a tag with the scroll-top class
        if (this.scrollY >= 560) scrollUp.classList.add('show-scroll');
        else scrollUp.classList.remove('show-scroll')
    }
    window.addEventListener('scroll', scrollUp)
</script> --}}
