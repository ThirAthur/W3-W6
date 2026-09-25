<div>
    <label for="title">Judul</label>
    <input type="text" name="title" id="title" value="{{ old('title', $activity->title ?? '') }}">
    @error('title')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="description">Deskripsi</label>
    <textarea name="description" id="description">{{ old('description', $activity->description ?? '') }}</textarea>
    @error('description')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="activity_date">Tanggal Kegiatan</label>
    <input type="date" name="activity_date" id="activity_date" value="{{ old('activity_date', isset($activity) ? \Carbon\Carbon::parse($activity->activity_date)->format('Y-m-d') : '') }}">
    @error('activity_date')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="category">Kategori</label>
    <input type="text" name="category" id="category" value="{{ old('category', $activity->category ?? '') }}">
    @error('category')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>

<div>
    <label for="status">Status</label>
    <select name="status" id="status">
        <option value="" disabled {{ old('status', $activity->status ?? '') == '' ? 'selected' : '' }}>-- Pilih Status --</option>
        <option value="Planned" {{ old('status', $activity->status ?? '') == 'Planned' ? 'selected' : '' }}>Planned</option>
        <option value="Ongoing" {{ old('status', $activity->status ?? '') == 'Ongoing' ? 'selected' : '' }}>Ongoing</option>
        <option value="Done" {{ old('status', $activity->status ?? '') == 'Done' ? 'selected' : '' }}>Done</option>
    </select>
    @error('status')
        <div style="color: red;">{{ $message }}</div>
    @enderror
</div>