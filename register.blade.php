<h2>Register</h2>

@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<!-- Tambahkan penanganan error jika validasi gagal -->
@if ($errors->any())
    <div style="color:red">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="/register">
    @csrf
    <input type="text" name="name" placeholder="Nama" value="{{ old('name') }}"><br><br>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    
    <!-- WAJIB TAMBAHKAN INPUT INI -->
    <input type="password" name="password_confirmation" placeholder="Konfirmasi Password"><br><br>
    
    <button type="submit">Register</button>
</form>

<p>Sudah punya akun?</p><br>
<a href="/login">Masuk ke Sini</a>
