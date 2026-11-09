<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Nilai</title>
</head>
<body>

    <div class="header">
        <div class="logo">
            <img src="{{ asset('img/logo.jpg') }}" alt="Logo" style="width: 50px; height: auto;">
        </div>
        <div class="title">
            <h1>Aplikasi Nilai</h1>
        </div>
    </div>

    <div class="menu" style="justify-content: space-between; align-items: center;">
    <div style="display: flex; gap: 20px;">
        <a href="{{ url('/penduduk') }}">Data Penduduk</a>
    </div>

    <!-- TOMBOL LOGOUT BARU -->
    <form action="/logout" method="POST" style="margin: 0; padding-right: 20px;">
        @csrf
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</div>


    <div class="container">
        @yield('content')
    </div>

    <div class="footer">
        <p>Created by @MazTeplu</p>
    </div>

    <style>
    body {
        margin: 5px;
        padding: 7px;
        background: #ffffff;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }
    .header {
        margin: 0;
        padding: 20px 20px;
        background: #1e293b;
        color: #00ffff;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    .logo {
        width: 50px;
        height: 50px;
        padding: 3px;
        background: #ffffff;
        border-radius: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }
    .logo img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .title h1 {
        margin: 0;
        padding: 0;
        font-size: 22px;
        font-weight: 700;
    }
    .title h4 {
        margin: 0;
        padding: 0;
    }
    .menu {
        display: flex;
        background: #334155;
        color: white;
        gap: 20px;
        padding: 10px 20px;
    }
    .menu a {
        color: #00ffff;
        text-decoration: none;
        font-weight: 700;
        border-radius: 10px;
        padding: 5px 20px;
    }
    .menu a:hover {
        background: #475569;
    }

    .container {
        width: 90%;
        margin: 15px auto;
        background: lightblue;
        border-radius: 8px;
        box-shadow: 0px 10px 15px rgba(3, 4, 57, 0.01);
        padding: 15px;
        flex: 1;
        min-width: 0;
    }
    /* BARU: container bersarang tidak boleh mengecil lagi */
    .container .container {
        width: 100%;
        margin: 0;
        padding: 0;
        background: transparent;
        box-shadow: none;
    }
    .container h1 {
        margin: 20px 0 5px 0;
        font-size: 20px;
    }
    .slider {
        position: relative;
        width: 600px;
        height: 300px;
        background: blue;
        margin: 20px auto;
        color: white;
        overflow: hidden;
        border-radius: 20px;
    }
    .slide {
        position: absolute;
        width: 100%;
        height: 100%;
        opacity: 0;
    }
    .slide img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    @keyframes animasi {
        0% {opacity: 0;}
        50% {opacity: 1;}
        100% {opacity: 0;}
    }
    .slide:nth-child(1) { animation: animasi 12s infinite 0s; }
    .slide:nth-child(2) { animation: animasi 12s infinite 4s; }
    .slide:nth-child(3) { animation: animasi 12s infinite 8s; }

    .form-group {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
        gap: 10px;
    }
    .form label {
        width: 200px;
    }
    form input[type="text"], form input[type="number"], form select {
        width: 500px;
        padding: 8px;
        box-sizing: border-box;
        border-radius: 10px;
        border: 1px solid #1e293b;
    }
    form button, .btn {
        padding: 10px;
        border-radius: 10px;
        background: #1e293b;
        color: aliceblue;
        font-weight: 600;
        box-sizing: border-box;
        cursor: pointer;
        text-decoration: none;
    }

    /* DIUBAH: tabel */
    .table-wrapper {
        overflow-x: auto;
        width: 100%;
    }
    table {
        border-collapse: collapse;
        border: 1px solid darkblue;
        width: 100%;
        min-width: 1500px;   /* tabel dipaksa lebar, sisanya bisa digeser */
        font-size: 13px;
        background: #ffffff;
    }
    td, th {
        padding: 10px 14px;
        border: 1px solid rgb(54, 2, 196);
        white-space: nowrap;  /* teks tidak dipecah per huruf */
    }
    th {
        color: #ffffff;
        background: #334155;
    }
    /* Kolom Alamat Jalan (kolom ke-11) boleh turun baris */
    td:nth-child(11) {
        white-space: normal;
        min-width: 220px;
        overflow-wrap: anywhere;
    }

    /* BARU: kolom aksi */
    .aksi {
        white-space: nowrap;
        min-width: 170px;
    }
    .aksi form {
        display: inline;
    }
    .aksi .btn, .aksi button {
        display: inline-block;
        padding: 6px 12px;
        font-size: 12px;
    }

    .footer {
        background: #1e293b;
        padding: 20px 30px;
        margin: 0;
        text-align: center;
        color: aqua;
    }
    .kontak {
        max-width: 900px;
        margin: 40px auto;
        padding: 30px;
        background-color: #ffffff;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
    }
    .kontak h1 {
        text-align: center;
        color: #1b5e20;
        margin-bottom: 30px;
        font-size: 30px;
    }
    .kontak img {
        width: 100px;
        height: 100px;
        object-fit: contain;
        display: block;
        margin: 20px auto 10px;
        border-radius: 15px;
    }
    .kontak p {
        text-align: center;
        margin: 5px 0 30px;
        font-size: 18px;
        color: #333;
        font-weight: bold;
    }
    .kontak img:hover {
        transform: scale(1.08);
        transition: 0.3s;
    }
    @media (max-width: 600px) {
        .kontak {
            margin: 20px 15px;
            padding: 20px;
        }
        .kontak h1 {
            font-size: 24px;
        }
        .kontak img {
            width: 80px;
            height: 80px;
        }
        .kontak p {
            font-size: 16px;
        }
    /* Style Tambahan untuk Tombol Logout */
    .btn-logout {
        padding: 6px 18px;
        border-radius: 8px;
        background: #dc3545; /* Warna Merah */
        color: white;
        font-weight: 700;
        border: none;
        cursor: pointer;
        font-family: inherit;
        transition: 0.2s;
    }
    .btn-logout:hover {
        background: #bd2130;
    }

    }
</style>
</body>
</html>
    