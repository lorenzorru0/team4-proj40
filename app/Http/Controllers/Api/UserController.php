<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Type;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'data' => $users
        ]);
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $user = User::where('slug', $slug)->with('plates')->first();

        if( $user ) {
            return response()->json([
                'success' => true,
                'data' => $user
            ]);
        }

        return response()->json([
            'success' => false,
            'data' => 'Nessun ristorante trovato'
        ]);
    }

    public function types($slug)
    {
        $user = User::where('slug', $slug)->with('types')->first();

        return response()->json([
            'success' => true,
            'data' => $user->types
        ]);
    }

    public function typesAll()
    {
        $types = Type::all();

        return response()->json([
            'success' => true,
            'data' => $types
        ]);
    }

    public function usersTypes()
    {
        $users = User::all();

        foreach($users as $user) {
            $types[$user->id] = $user->types;
        }
        
        $usersTypes = [];

        foreach($types as $key => $type) {
            foreach($type as $singleType) {
                $ids[] = $singleType->id;
            }
            $usersTypes[] = $ids;
            $ids = [];
            $arrayKeys[] = $key;
        }

        return response()->json([
            'success' => true,
            'data' => $usersTypes
        ]);
    }
}
