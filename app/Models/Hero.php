<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Hero extends Model
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function civilization(): BelongsTo {
        return $this->belongsTo(Civilization::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function statistics(): MorphToMany {
        return $this->morphToMany(Statistic::class, 'statisticable')
                    ->withPivot('value');
    }
}
