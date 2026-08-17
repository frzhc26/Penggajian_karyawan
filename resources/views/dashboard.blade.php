<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

    <h1>Dashboard Admin</h1>

    <hr>

    <h3>Selamat Datang {{ Auth::user()->name }}</h3>

    <ul>
        <li><a href="#">Data Departemen</a></li>
        <li><a href="#">Data Jabatan</a></li>
        <li><a href="#">Data Pegawai</a></li>
        <li><a href="#">Data Penggajian</a></li>
    </ul>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>

</body>
</html>