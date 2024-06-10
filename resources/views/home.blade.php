<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <title>Home - Internet Banking Sejahtera</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}">Costumer Service</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="sidebar">
            <ul class="menu">
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('account-info')">Informasi Rekening</a>
                    <ul class="sub-menu" id="account-info">
                        <li><a href="#">Informasi Saldo</a></li>
                        <li><a href="#">Mutasi Rekening</a></li>
                    </ul>
                </li>
                <li><a href="#">Transfer Dana</a></li>
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('administration')">Administrasi</a>
                    <ul class="sub-menu" id="administration">
                        <li><a href="#">Ganti PIN</a></li>
                        <li><a href="#">Ubah Alamat Email</a></li>
                        <li><a href="#">Ubah Nomor Telepon</a></li>
                        <li><a href="#">Pembaruan Data Diri</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        
        <div class="content">
            <h1>Selamat Datang di Internet Banking Sejahtera</h1>
            <p>Silahkan memilih menu di sebelah kiri untuk mengakses fitur-fitur kami.</p>
            <img src = "{{ asset('img/Home.JPG') }}" width="60%" height="60%">
        </div>
    </div>

    <div class="footer">
        <p>Copyright &#169 2024 Bank Sejahtera (Persero) tbk</p>
    </div>

    <script>
        function toggleSubMenu(id) {
            var subMenu = document.getElementById(id);
            if (subMenu.style.display === "block") {
                subMenu.style.display = "none";
            } else {
                subMenu.style.display = "block";
            }
        }
    </script>
</body>
</html>
