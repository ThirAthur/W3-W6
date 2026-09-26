<?php

namespace App\Services;

use App\Models\Activity;
use DomainException;

class ActivityService
{
    public function create(array $data): Activity
    {
        return Activity::create($data);
    }
    public function update(Activity $activity, array $data): bool
    {
        if ($activity->status === 'Done' && $data['status'] === 'Planned') {
            throw new DomainException('Kegiatan yang sudah selesai tidak dapat diubah statusnya menjadi Planned.');
        }

        return $activity->update($data);
    }
}