@extends('layouts.app')
@section('content')
<h1>Detail Kegiatan: {{ $activity->title }}</h1>
<p>Deskripsi: {{ $activity->description }}</p>
<p>Tanggal: {{ $activity->activity_date->format('d M Y') }}</p>
<p>Kategori: {{ $activity->category }}</p>
<p>Status: {{ $activity->status }}</p>
<a href="{{ route('activities.index') }}">Kembali</a>
@endsection