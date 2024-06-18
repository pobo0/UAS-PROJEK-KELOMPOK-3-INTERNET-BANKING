<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/changePin.css') }}">
    <title>Ganti Nomor Telepon</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ route('home', ['id' => $account->id]) }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Costumer Service</a></li>
            <li><a class="logOut" href="{{ url('/') }}">[Log Out]</a></li>
        </ul>
    </div>

    <div class="main-content">
        <div class="sidebar">
            <ul class="menu">
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('account-info')">Informasi Rekening</a>
                    <ul class="sub-menu" id="account-info">
                        <li><a href="{{ route('balanceInfo', ['id' => $account->id]) }}">Informasi Saldo</a></li>
                        <li><a href="{{ route('mutation', ['id' => $account->id]) }}">Mutasi Rekening</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('transfer', ['id' => $account->id]) }}">Transfer Dana</a></li>
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('administration')">Administrasi</a>
                    <ul class="sub-menu" id="administration">
                        <li><a href="{{ route('changePin', ['id' => $account->id]) }}">Ganti PIN</a></li>
                        <li><a href="#">Ubah Alamat Email</a></li>
                        <li><a href="{{ route('changePhone', ['id' => $account->id]) }}">Ubah Nomor Telepon</a></li>
                        <li><a href="#">Pembaruan Data Diri</a></li>
                    </ul>
                </li>
            </ul>
        </div>    

        <div class="content">
            <h2>Administrasi - Ubah Nomor Telepon</h2>
            <form class='passwordInput' action="{{ route('change-phone', ['id' => $account->id]) }}" method="POST">
                @csrf
                @method('PATCH')
                <input type="text" name="phoneLama" placeholder="Masukkan Nomor Telepon Lama Anda Saat Ini">
                <input type="text" name="phoneBaru" placeholder="Masukkan Nomor Telepon Baru">
                <button type="submit">Ubah Nomor Telepon</button>
            </form>
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
