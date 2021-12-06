<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plate;
use Illuminate\Support\Facades\Storage;


class PlatesController extends Controller
{
    protected $validationRules = [
        'plate_name' => 'string|required|max:50',
        'description' => 'string|nullable',
        'price' => 'required|numeric',
        'cooking_time' => 'nullable|numeric',
        'visible' => 'required|numeric',
        'url_photo' => 'nullable', 'image', 'max:200'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::where('user_id', Auth::user()->id)->get();

        return view('plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        $data = $request->all();

        $newPlate = new Plate();

        if (array_key_exists('url_photo', $data)) {
            $cover_path = Storage::put('plates_photos', $data['url_photo']);
            $data['url_photo'] = $cover_path;
        } else {
            $data['url_photo'] = NULL;
        }

        $newPlate->fill($data);
        $newPlate->user_id = Auth::user()->id;

        $newPlate->save();

        return redirect()->route("admin.plates.index")->with('success', "New plate has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        return view('plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        return view('plates.edit', compact('plate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
         // validations
        $request->validate($this->validationRules);
        $data = $request->all();

        if(array_key_exists('url_photo', $data)) {
            if (Storage::exists($plate->url_photo)) {
                Storage::delete($plate->url_photo);
            }
            $cover_path = Storage::put('plates_photos', $data['url_photo']);
            $data['url_photo'] = $cover_path;
        }

        $plate->update($data);
        
        $plate->save();

        return redirect()->route("admin.plates.index")->with('success', "The plate has been updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $plate = Plate::find($request->deleteId);

        $plate->delete();

        return redirect()->route('admin.plates.index')->with('success', "The post number {$plate->id} has been deleted");
    }

    /**
     * Chanmge visibilty of the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeVisibility(Plate $plate)
    {
        if($plate->visible) {
            $plate->visible = 0;
        } else {
            $plate->visible = 1;
        }

        $plate->save();

        return redirect()->route("admin.plates.index")->with('success', "Visibility changed");
    }
}
