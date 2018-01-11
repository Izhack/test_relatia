<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;
use Validator;

//use App\Event;

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

        //On affiche le status au lieu de l'id
        foreach($users as $user){
            $event = Event::select('status')->where('id', $user['event'])->first()->toArray(); //Je souhaite récuperer uniquement l'intitulé de l'évenement
            $user['event'] = $event['status'];
        }
        return response()->json([
            'message' => 'Liste des utilisateurs',
            'data' => $users->toArray(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'Message' => "L'email n'est pas conforme",
            ]);
        } else {
            $userInput = $request->all();
            $user = User::create($userInput);

            $user = User::find($user->id);
            $event = Event::select('status')->where('id', $user['event'])->first()->toArray(); //Je souhaite récuperer uniquement l'intitulé de l'évenement
            $user['event'] = $event['status'];

            if ($user) {
                return response()->json([
                    'message' => "L'utilisateur est dans la db",
                    'data' => $user->toArray(),

                ]);
            } else {
                return response()->json([
                    'message' => 'Echec',
                    'data' => null,
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  id de l'utilisateur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        User::where('id', $id)->update(array('event' => 2));
        $user = User::find($id);
        if ($user) {
            $event = Event::select('status')->where('id', $user['event'])->first()->toArray(); //Je souhaite récuperer uniquement l'intitulé de l'évenement
            $user['event'] = $event['status'];
            return response()->json([
                'message' => 'Retourne l\'utilisateur qui a l\'id ' . $id,
                'data' => $user->toArray(),
            ]);
        } else {
            abort(404, 'UtilsiateurNotFound');
        }

    }

}
