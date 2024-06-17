<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/transfer.css') }}">
    <title>Transfer Dana</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ route('home', ['id' => $account->id]) }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Customer Service</a></li>
            <li><a class="logOut" href="{{ url('/') }}">[Log Out]</a></li>
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
            <h1>Transfer Dana</h1>

            <form class = "transferInfo" method="POST" action="/transfer">
                @csrf

                <label for="account">No rekening</label>
                <input type="text" id="account" name="account" required>

                <label for="amount">Jumlah</label>
                <input type="number" id="amount" name="amount" required>

                <label for="description">Berita</label>
                <input type="text" id="description" name="description">

                <input type="submit" value="Transfer">
            </form>
        </div>
    </div>

    <div class="footer">
        <p>&#169; 2024 Bank Sejahtera (Persero) tbk</p>
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
