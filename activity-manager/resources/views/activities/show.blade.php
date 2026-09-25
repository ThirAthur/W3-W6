<!DOCTYPE html>
<html>
<head>
    <title>Detail Kegiatan</title>
</head>
<body>
    <h1>Detail Kegiatan</h1>

    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <ul>
        <li><strong>Judul:</strong> {{ $activity->title }}</li>
        <li><strong>Deskripsi:</strong> {{ $activity->description }}</li>
        <li><strong>Tanggal:</strong> {{ $activity->activity_date }}</li>
        <li><strong>Kategori:</strong> {{ $activity->category }}</li>
        <li><strong>Status:</strong> {{ $activity->status }}</li>
    </ul>

    <a href="{{ route('activities.edit', $activity) }}">Edit Kegiatan</a> |
    <a href="{{ route('activities.index') }}">Kembali ke Daftar</a>
</body>
</html>