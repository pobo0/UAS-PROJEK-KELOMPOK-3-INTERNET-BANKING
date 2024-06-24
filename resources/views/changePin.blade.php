<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/changePin.css') }}">
    <title>Ganti PIN</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ route('home', ['id' => $account->id]) }}">Home</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Customer Service</a></li>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logOut">Log Out</button>
            </form>
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

                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('transfer')">Transfer Dana</a>
                    <ul class="sub-menu" id="transfer">
                        <li><a href="{{ route('accountList', ['id' => $account->id]) }}">Daftar Rekening Tujuan</a></li>     
                        <li><a href="{{ route('transfer', ['id' => $account->id]) }}">Transfer</a></li>
                    </ul> 
                </li>
                
                <li>
                    <a href="#" class="menu-item" onclick="toggleSubMenu('administration')">Administrasi</a>
                    <ul class="sub-menu" id="administration">
                        <li><a href="{{ route('changePin', ['id' => $account->id]) }}">Ganti PIN</a></li>
                        <li><a href="{{ route('changeEmail', ['id' => $account->id]) }}">Ubah Alamat Email</a></li>
                        <li><a href="{{ route('changePhone', ['id' => $account->id]) }}">Ubah Nomor Telepon</a></li>
                        <li><a href="{{ route('updateProfile', ['id' => $account->id]) }}">Pembaruan Data Diri</a></li>
                    </ul>
                </li>
            </ul>
        </div>    

    <div class="content">
        @if (session('error'))
            <p class="error-message">{{ session('error') }}</p>
        @endif
        @if (session('status'))
            <p class="status-message">{{ session('status') }}</p>
        @endif
        <h2>Administrasi - Ganti PIN</h2>
        <form class='passwordInput' action="{{ route('change-pin', ['id' => $account->id]) }}" method="POST">
            @csrf
            @method('PATCH')
            <input type="password" class='password' name="pinLama" placeholder="Masukkan PIN Lama Anda Saat Ini" pattern="[0-9]{6}" required>
            <input type="password" class='password' name="pinBaru" placeholder="Masukkan PIN Baru (6 Angka)" pattern="[0-9]{6}" required>
            <input type="password" class='password' name="pinBaru_confirmation" placeholder="Konfirmasi Ulang PIN Baru" pattern="[0-9]{6}" required>
            <button type="submit">Ganti PIN</button>
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

        document.querySelectorAll('.password').forEach(function(element) {
            element.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, ''); // Membuang input yang bukan angka
                e.target.value = value;
            });
        });
    </script>
</body>
</html>
