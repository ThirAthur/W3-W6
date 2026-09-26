<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Request\StoreActivityRequest;
use App\Http\Request\UpdateActivityRequest;

// Tambahkan dua baris ini untuk Task 3
use App\Services\ActivityService;
use DomainException;

class ActivityController extends Controller
{
    public function index(): View
    {
        $activities = Activity::query()
            ->orderBy('activity_date')
            ->get();
            
        return view('activities.index', compact('activities'));
    }

    public function create(): View
    {
        return view('activities.create');
    }

    // UPDATE: Gunakan ActivityService untuk menyimpan data
    public function store(
        StoreActivityRequest $request,
        ActivityService $service
    ): RedirectResponse {
        $activity = $service->create($request->validated());
        
        return to_route('activities.show', $activity)
            ->with('success', 'Kegiatan berhasil dibuat.');
    }

    public function show(Activity $activity): View
    {
        return view('activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        return view('activities.edit', compact('activity'));
    }

    // UPDATE: Gunakan ActivityService untuk update dan tangkap error dari aturan bisnis
    public function update(
        UpdateActivityRequest $request,
        Activity $activity,
        ActivityService $service
    ): RedirectResponse {
        try {
            // Memanggil logika update dari service
            $service->update($activity, $request->validated());
        } catch (DomainException $exception) {
            // Jika ada aturan bisnis yang dilanggar, kembalikan ke halaman sebelumnya dengan pesan error
            return back()
                ->withErrors(['status' => $exception->getMessage()])
                ->withInput();
        }
        
        return to_route('activities.show', $activity)
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();
        
        return to_route('activities.index')
            ->with('success', 'Data kegiatan berhasil dihapus.');
    }
}