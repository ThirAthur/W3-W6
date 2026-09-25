<!DOCTYPE html>
<html>
<head>
    <title>Edit Kegiatan</title>
</head>
<body>
    <h1>Edit Kegiatan</h1>

    <form action="{{ route('activities.update', $activity) }}" method="POST">
        @method('PUT')
        <!-- Memanggil partial form -->
        @include('activities._form')
        
        <button type="submit">Perbarui Kegiatan</button>
        <a href="{{ route('activities.show', $activity) }}">Batal</a>
    </form>
</body>
</html>