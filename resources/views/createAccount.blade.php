<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/createAccount.css') }}">
    <title>Daftar Akun - Bank Sejahtera</title>
</head>
<body>
    <div class="header">
        <p class="logo">INTERNET BANKING SEJAHTERA</p>
        <ul>
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/customer-service') }}" target="_blank">Customer Service</a></a></li>
        </ul>
    </div>

    <div class="hero">
        <div class="content">
            @if (session('error'))
                <p class="error-message">{{ session('error') }}</p>
            @endif
            <h2>Pendaftaran Akun Baru</h2>
            <form action="{{ url('/create-account') }}" method="POST" class="create-account-form" onsubmit="return validateTermsForm()">
                @csrf
                <label for="fullname">Nama Lengkap:</label>
                <input type="text" id="fullname" name="fullname" required>

                <label for="dob">Tanggal Lahir:</label>
                <input type="date" id="dob" name="dob" required>

                <label for="gender">Jenis Kelamin:</label>
                <select id="gender" name="gender" required>
                    <option value="" disabled selected>Pilih opsi</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>

                <label for="address">Alamat:</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Nomor Telepon:</label>
                <input type="tel" id="phone" name="phone" class="phone" pattern="[0-9]{10,15}" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="username">Username (6-21 digit angka/huruf/kombinasi keduanya):</label>
                <input type="text" id="username" name="username" pattern="[A-Za-z0-9]{6,21}" required>
                <button type="button" id="check-username-button">Cek Ketersediaan Username</button>
                <p id="username-availability-message"></p>

                <label for="pin">PIN (6 Angka):</label>
                <div class="password-wrapper">
                    <input class="password" type="password" id="pin" name="pin" pattern="[0-9]{6}" required>
                    <span class="toggle-password" onmousedown="showPassword('pin')" onmouseup="hidePassword('pin')" onmouseout="hidePassword('pin')">👁️</span>
                </div>

                <label for="confirm-pin">Konfirmasi PIN:</label>
                <div class="password-wrapper">
                    <input class="password" type="password" id="pin_confirmation" pattern="[0-9]{6}" name="pin_confirmation" required>
                    <span class="toggle-password" onmousedown="showPassword('pin_confirmation')" onmouseup="hidePassword('pin_confirmation')" onmouseout="hidePassword('pin_confirmation')">👁️</span>
                </div>

                <div class="terms-conditions">
                    <input type="checkbox" id="terms" required>
                    <label for="terms">Saya setuju dengan <a href="{{ url('/syarat-ketentuan') }}" target="_blank">Syarat dan Ketentuan</a></label>
                </div>

                <button type="submit" class="create-account-button">Buat Akun</button>
            </form>
        </div>
    </div>
    <div class="footer">
        <p>Copyright &#169; 2024 Bank Sejahtera (Persero) tbk</p>
    </div>

    <script>
        function showPassword(id) {
            document.getElementById(id).type = 'text';
        }

        function hidePassword(id) {
            document.getElementById(id).type = 'password';
        }

        function validateTermsForm() {
            var terms = document.getElementById('terms');
            if (!terms.checked) {
                alert("Anda harus setuju dengan syarat dan ketentuan");
                return false;
            }
            return true;
        }

        document.getElementById('username').addEventListener('input', function(e) {
            this.value = this.value.replace(/\s/g, ''); // Membuang spasi dari input
        });

        document.getElementById('check-username-button').addEventListener('click', function() {
            var username = document.getElementById('username').value;
            var messageElement = document.getElementById('username-availability-message');
            if (username.length >= 6 && username.length <= 21) {
                checkUsernameAvailability(username);
            } else {
            messageElement.textContent = 'Username harus memiliki panjang antara 6 dan 21 karakter.';
            messageElement.style.color = 'red'; 
            }
        });

        function checkUsernameAvailability(username) {
            fetch('/check-username?username=' + username)
            .then(response => response.json())
            .then(data => {
                var messageElement = document.getElementById('username-availability-message');
                if (data.available) {
                    messageElement.textContent = 'Username tersedia';
                    messageElement.style.color = 'green';
                } else {
                    messageElement.textContent = 'Username tidak tersedia';
                    messageElement.style.color = 'red';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }


        document.querySelectorAll('.phone').forEach(function(element) {
            element.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, ''); // Membuang input yang bukan angka
                e.target.value = value;
            });
        });

        document.querySelectorAll('.password').forEach(function(element) {
            element.addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, ''); // Membuang input yang bukan angka
                e.target.value = value;
            });
        });
    </script>
</body>
</html>
