<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     
    public function index()
    {
        $players = Player::all();
        return view('players.index', [
            'players' => $players
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('players.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Player $player)
    {

        $validatedData = $request->validate([

            'image' => 'nullable',
            'firstName' => 'required',
            'surname' => 'required',
            'age' => 'required',
            'position' => 'required',
            'image' => 'mimes:jpg,jpeg,png,gif'

        ]);

        $imagePath = (request('image')->store('images', 'public'));

       // dd($imagePath);

        if ($request->hasFile('image') == null){
            $imagePath = "/uploads/profileImage.jpg";
        } else {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $player->firstName = $request->input('firstName');
        $player->surname = $request->input('surname');
        $player->age = $request->input('age');
        $player->position = $request->input('position');
        $player->image = $imagePath;

        

        $player->save();

        return redirect('/players')->with('success', 'Player successfully added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        $players= Player::all();

        return view('players.show', [
            'players' => $players,
            'player' => $player,
            'layout' => 'show'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);
     

        $arr['player'] = $player;
        return view('players.edit')->with($arr);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $player = Player::find($id);

        if (!empty($request->input('firstName'))) {           
            $player->firstName = $request->input('firstName');
        }

        if (!empty($request->input('surname'))){
            $player->surname = $request->input('surname');
        }

        if (!empty($request->input('age'))){
            $player->age = $request->input('age');
        }

        if (!empty($request->input('position'))){
            $player->position = $request->input('position');
        }

        if (!empty($request->hasFile('image'))){
            $player->image = (request('image')->store('uploads', 'public'));
        }
      
        $player->save();

        return redirect('/players')->with('success', 'Player profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Player::destroy($id);

        
        return redirect('/players')->with('Success', 'Player profile successfully deleted!');


    }
}
