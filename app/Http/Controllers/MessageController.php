<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMessage;

class MessageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessage $request)
    {
        $validated = $request->validated();

        Message::create($validated);

        return redirect()->route('home')->with('green', 'Votre message à bien été envoyé ! Il sera traité dans les plus brefs délais ...');
    }
}
