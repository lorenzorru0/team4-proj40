<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Validation rules
     */
    protected $validationRules = [
        'business_name' => 'string|required|max:80',
        'address' => 'string|required',
        'street_number' => 'string|required',
        'vat_number' => 'numeric|digits:11',
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $types = Type::all();

        return view('users.edit', compact('user', 'types'));
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
        // Validation
        $request->validate($this->validationRules);
        
        $data = $request->all();
    
        if($user->business_name != $data['business_name']) {
            $user->slug = $this->getSlug($data['business_name']);
        }


        if(array_key_exists('url_cover', $data) && $data['url_cover'] != null) {

            if (Storage::exists($user->url_cover)) {
                Storage::delete($user->url_cover);
            }
            $cover_path = Storage::put('users_covers', $data['url_cover']);
            $data['url_cover'] = $cover_path;
        }

        $user->update($data);
        
        $user->save();

        $user->types()->sync($data['types']);

        return redirect()->route("admin.users.index");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (Storage::exists($user->url_cover)) {
            Storage::delete($user->url_cover);
        }

        $user->delete();

        return redirect()->route('home');
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
}
