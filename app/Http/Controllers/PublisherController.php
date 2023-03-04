<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    public function addPublisher()
    {
        return Publisher::create([
            'name' => request()->name,
            'place' => request()->place,

        ]);
    }

    public function edit($id)
    {

        return $editPublisher = Publisher::find($id);
    }


    public function update($id)
    {
        $publisher = Publisher::find($id);
        $publisher->update([
            'name' => request()->name,
            'place' => request()->place,
        ]);
        return $publisher;
    }


    public function destroy($publisherId)
    {
        $publisher = Publisher::find($publisherId);

        return $publisher->delete();
    }
}
