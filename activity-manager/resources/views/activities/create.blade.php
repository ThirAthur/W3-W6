<!DOCTYPE html>
<html>
<head>
    <title>Tambah Kegiatan</title>
</head>
<body>
    <h1>Tambah Kegiatan Baru</h1>

    <form action="{{ route('activities.store') }}" method="POST">
        <!-- Memanggil partial form -->
        @include('activities._form')
        
        <button type="submit">Simpan Kegiatan</button>
        <a href="{{ route('activities.index') }}">Batal</a>
    </form>
</body>
</html>