<?php

namespace App\Http\Controllers;

use App\Models\Civilization;
use App\Models\Hero;
use Illuminate\Http\Request;
use TCG\Voyager\Http\Controllers\VoyagerBaseController;

class VoyagerHeroesController extends VoyagerBaseController
{

    public function edit(Request $request, $id) {
        $hero = Hero::findOrFail($id)->load('statistics', 'civilization');

        $civilizations = Civilization::query()->get([
                                                        'id',
                                                        'name',
                                                    ]);
        return view('voyager::heroes.edit-add', [
            'hero'          => $hero,
            'civilizations' => $civilizations,
            'edit'          => TRUE,
        ]);
    }

    public function update(Request $request, $id) {

    }

    public function create(Request $request) {
        return view('voyager::heroes.edit-add', [
            'edit' => FALSE,
        ]);
    }
}
