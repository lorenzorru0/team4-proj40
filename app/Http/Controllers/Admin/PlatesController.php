<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Plate;
use Illuminate\Support\Facades\Storage;


class PlatesController extends Controller
{
    protected $validationRules = [
        'plate_name' => 'string|required|max:50',
        'description' => 'string|nullable',
        'price' => 'required|numeric',
        'cooking_time' => 'nullable|numeric',
        'visible' => 'numeric|min:0|max:1',
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

        if( count($plates) != 0) {
            $plates = $this->sortPlates($plates);
        }

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

        return redirect()->route("admin.plates.index")->with('success', "L' articolo è stato creato.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        if( $plate->user_id != Auth::id() ) {
            abort("403");
        }

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
        if( $plate->user_id != Auth::id() ) {
            abort("403");
        }
        
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

        return redirect()->route("admin.plates.index")->with('success', "L' articolo è stato aggiornato.");
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

        if (Storage::exists($plate->url_photo)) {
            Storage::delete($plate->url_photo);
        }

        $plate->delete();

        return redirect()->route('admin.plates.index')->with('success', "L' articolo è stato cancellato.");
    }

    /**
     * Change visibilty of the specified resource.
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

        return redirect()->route("admin.plates.index")->with('success', "Visibilità cambiata.");
    }

    /**
     * Sort all plates of the specific resource.
     * 
     * @param  array  $plates
     * @return array $sortPlates
     */
    public function sortPlates($plates)
    {
        foreach($plates as $plate) {
            $platesName[] = $plate->plate_name;
        }
        sort($platesName);

        foreach($platesName as $plateName) {
            foreach ($plates as $plate) {
                if($plateName == $plate->plate_name) {
                    $sortPlates[] = $plate;
                }
            }
        }

        return $sortPlates;
    }
}
