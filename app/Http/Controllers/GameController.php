<?php

namespace App\Http\Controllers;

use App\Models\Games;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Games::all();
        return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Creem les regles de validació
        $rules = [
            'title' => 'required',
            'developer' => 'required',
            'year' => 'required',
            'description' => 'required',
        ];

        // // Executem el validador. Si falla retornem l’error
        // $validator = Validator::make($request->all(), $rules);
        // if ($validator->fails()) {
        //     return [
        //         'created' => false,
        //         'errors' => $validator->errors()->all()
        //     ];
        // }

        Games::create($request->all());
        return ['created' => true];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Games::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $game = Games::findOrFail($id);
        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $game = Games::findOrFail($id);
        $game->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Games::destroy($id);
        return ['destroyed' => true];
    }
}
