<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('user.cards.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'card_number' => 'required|numeric',
            'card_holder_name' => 'required|string',
            'expiry_date' => 'required',
            'cvv' => 'required|numeric',
        ]);

        $card = new Card();
        $card->card_number = $request->card_number;
        $card->card_holder_name = $request->card_holder_name;
        $card->expiry_date = $request->expiry_date;
        $card->cvv = $request->cvv;
        $card->user_id = auth()->guard("user")->id();
        $card->is_default = $request->is_default ?? false;
        $card->save();

        return redirect()->route('user.cards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $card = Card::find($id);
        $card->delete();
        return redirect()->route('user.cards.index');
    }
}
