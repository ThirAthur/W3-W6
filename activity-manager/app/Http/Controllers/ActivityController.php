<?php
namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Request\StoreActivityRequest;
use App\Http\Request\UpdateActivityRequest;

class ActivityController extends Controller
{
    public function index(): View
    {
        $activities = Activity::query()->orderBy('activity_date')->get();
        return view('activities.index', compact('activities'));
    }

    public function show(Activity $activity): View
    {
        return view('activities.show', compact('activity'));
    }
    public function create(): View
    {
    return view('activities.create');
    }
    public function store(StoreActivityRequest $request): RedirectResponse
    {
        $activity = Activity::create($request->validated());
        
        return to_route('activities.show', $activity)->with('success', 'Data kegiatan berhasil ditambahkan.');
    }
    public function edit(Activity $activity): View
    {
        return view('activities.edit', compact('activity'));
    }
    public function update(
    UpdateActivityRequest $request,
    Activity $activity
    ): RedirectResponse {
        $activity->update($request->validated());
        
        return to_route('activities.show', $activity)->with('success', 'Data kegiatan berhasil diperbarui.');
    }
    public function destroy(Activity $activity): RedirectResponse
    {
        $activity->delete();
        return to_route('activities.index')->with('success', 'Data kegiatan berhasil dihapus.');
    }
}