<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Client;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function curl(Request $request)
    {

       dd($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $clients  = new Client;
        $clients->name = request('name');
        $clients->email = request('email');
        $clients->phone = request('phone');
        $clients->city = request('city');
        $clients->company = request('company');
        $clients->comments = request('comments');
        $clients->save();
        return redirect('/thanks');
    }

    public function send(Request $request)
    {
        $data = $request->only(['from', 'to']);
        $data['to'] .= ' 23:59:59';
        $clients = Client::whereBetween('created_at', $data)->get();
        return view('home', compact('clients', 'data'));

    }

    public function thanks()
    {
        return view('thanks');

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
    public function edit($id)
    {
        //
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
        //
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

    public function testmail()
    {

        Mail::send('emails.welcome', [], function($message)
        {
            $message->to('sedyachenko@mail.ru');
            $message->subject('Welcome to Laravel');
            $message->from('sender@domain.net');
            $message->attach('file/doc1.docx');

        });
        return redirect('/');
    }
}
