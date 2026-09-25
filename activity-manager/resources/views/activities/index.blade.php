<!DOCTYPE html>
<html>
<head>
    <title>Daftar Kegiatan</title>
</head>
<body>
    <h1>Daftar Kegiatan</h1>

    <!-- Menampilkan Flash Message -->
    @if(session('success'))
        <div style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 15px;">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('activities.create') }}">Tambah Kegiatan Baru</a>

    <table border="1" cellpadding="10" cellspacing="0" style="margin-top: 15px; width: 100%;">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($activities as $activity)
                <tr>
                    <td>{{ $activity->title }}</td>
                    <td>{{ $activity->activity_date }}</td>
                    <td>{{ $activity->category }}</td>
                    <td>{{ $activity->status }}</td>
                    <td>
                        <a href="{{ route('activities.show', $activity) }}">Detail</a> |
                        <a href="{{ route('activities.edit', $activity) }}">Edit</a> |
                        
                        <!-- Form untuk menghapus data -->
                        <form action="{{ route('activities.destroy', $activity) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; border: none; background: none; cursor: pointer; text-decoration: underline;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>