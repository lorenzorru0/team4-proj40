<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    protected $validationRules = [
        'business_name' => 'string|required|max:80',
        'address' => 'string|required',
        'street_number' => 'string|required',
        'vat_number' => 'string|max:11',
        'description' => 'string',
        'url_cover' => 'nullable', 'image', 'max:200'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        
        return view('users.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // validations
        $request->validate($this->validationRules);

        if($user->business_name != $request->business_name) {
            $user->slug = $this->getSlug($request->business_name);
        }

        if(array_key_exists('url_cover', $request->all())) {
            if($user->url_cover != NULL) {
                $this->deleteImage($user->url_cover);
            }
            $cover_path = Storage::put('user_covers', $request->url_cover);
            $request->url_cover = $cover_path;
        }

        $user->update($request->all());
        
        $user->save();

        return redirect()->route("admin.index", $user->id);

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

    private function getSlug($business_name)
    {
        $slug = Str::of($business_name)->slug('-');

        $userExist = User::where("slug", $slug)->first();

        $count = 2;

        while($userExist) {
            $slug = Str::of($business_name)->slug('-') . "-{$count}";
            $userExist = User::where("slug", $slug)->first();
            $count++;
        }

        return $slug;
    }

    private function deleteImage($path_img)
    {
        $path_img = '/app/public/' . $path_img;

        if(Storage::exists($path_img)) {
            Storage::delete($path_img);
        }
    }
}
