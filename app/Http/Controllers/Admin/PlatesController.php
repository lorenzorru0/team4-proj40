<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Plate;
use App\Type;
use Illuminate\Support\Facades\Storage;


class PlatesController extends Controller
{
    protected $validationRules = [
        'plate_name' => 'string|required|max:50',
        'description' => 'string|nullable',
        'price' => 'required|numeric',
        'cooking_time' => 'nullable|numeric'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plates = Plate::where('users_id', Auth::user()->id)->get();
        
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

        $newPlate = new Plate();
        $newPlate->fill($request->all());
        $newPlate->user_id = Auth::user()->id;

        $newPlate->save();

        return redirect()->route("admin.plates.index", $newPlate->id)->with('success', "New plate has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

        //  if($plate->plate_name != $request->plate_name) {
        //      $plate->slug = $this->getSlug($request->plate_name);
        //  }
 
         if(array_key_exists('url_photo', $request->all())) {
             if($plate->url_photo != NULL) {
                 $this->deleteImage($plate->url_photo);
             }
             $cover_path = Storage::put('plate_covers', $request->url_photo);
             $request->url_photo = $cover_path;
         }
 
         $plate->update($request->all());
         
         $plate->save();
 
         return redirect()->route("admin.plates.index", $plate->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function deleteImage($path_img)
    {
        $path_img = '/app/public/' . $path_img;

        if(Storage::exists($path_img)) {
            Storage::delete($path_img);
        }
    }
}
