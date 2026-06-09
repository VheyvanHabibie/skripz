<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script type="text/javascript">
        /* Dark mode — v2 standalone */
        (function() {
            // Apply saved theme before paint
            if (localStorage.getItem('themeMode') === 'dark') {
                document.documentElement.setAttribute('data-theme', 'dark');
            }
        })();
    
        function swapTheme() {
            var isDark  = document.body.classList.contains('dark');
            var newMode = isDark ? 'light' : 'dark';
    
            document.body.classList.toggle('dark',  !isDark);
            document.body.classList.toggle('light',  isDark);
            localStorage.setItem('themeMode', newMode);
    
            var icon = document.getElementById('darkModeIcon');
            var text = document.getElementById('darkModeText');
            if (icon) icon.className = isDark ? 'fe fe-moon fe-16' : 'fe fe-sun fe-16';
            if (text) text.innerText  = isDark ? 'Mode Gelap'       : 'Mode Terang';
        }
    
        // Also expose on window just in case
        window.swapTheme = swapTheme;
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SkripZ</title>
    <link rel="icon" href="{{ asset('logo/logo-white.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}">
    
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}" id="theme-style">
    <link rel="stylesheet" href="{{ asset('assets/css/app-light.css') }}">
    
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        label.required::after {
            content: '*';
            color: red;
        }
        html.dark-preload body {
            background-color: #1a1d2e !important;
        }
    </style>
    
</head>

<body class="light">
    <div class="wrapper">
        <main role="main" class="main-content">
            @yield('content')
        </main>
    </div>
</body>
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/quill.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src='{{ asset('assets/js/select2.min.js') }}'></script>
<script>
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
    $(function() {
        $('#reload').click(function() {
            // Sembunyikan tombol reload dan tampilkan tombol loading
            $('#reload').hide();
            $('#loading-btn').show();

            // Lakukan AJAX request untuk reload CAPTCHA
            $.ajax({
                type: 'GET',
                url: '/reload-captcha', // Pastikan rutenya benar
                success: function(data) {
                    // Update elemen dengan ID 'captcha' dengan CAPTCHA baru
                    $("#captcha").html(data.captcha);

                    // Setelah CAPTCHA berhasil dimuat, sembunyikan tombol loading dan tampilkan tombol reload
                    $('#loading-btn').hide();
                    $('#reload').show();
                },
                error: function() {
                    // Jika terjadi kesalahan, tetap tampilkan tombol reload dan sembunyikan tombol loading
                    $('#loading-btn').hide();
                    $('#reload').show();
                }
            });
        });
    });
    $('.select2').select2({
        theme: 'bootstrap4',
        language: 'id' // Menggunakan kode bahasa Indonesia 'id'
    });
</script>
<script type="text/javascript">
    /* Dark mode boot — v2 */
    (function() {
        var saved = localStorage.getItem('themeMode') || 'light';
        var body  = document.body;
        var icon  = document.getElementById('darkModeIcon');
        var text  = document.getElementById('darkModeText');
 
        body.classList.remove('light', 'dark');
        body.classList.add(saved);
 
        if (saved === 'dark') {
            if (icon) icon.className = 'fe fe-sun fe-16';
            if (text) text.innerText  = 'Mode Terang';
        } else {
            if (icon) icon.className = 'fe fe-moon fe-16';
            if (text) text.innerText  = 'Mode Gelap';
        }
    })();
</script>
</html>
