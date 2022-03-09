<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return response()->json([
            'status'=> TRUE,
            'message'=>'Successfully created',
            'data'=> $contacts
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|email',
                'job_title'=>'required',
                'city'=>'required',
                'country'=> 'required'
            ]);
   
            $contact =  New Contact([
                'first_name'=> $request->first_name,
                'last_name'=> $request->last_name,
                'email'=> $request->email,
                'job_title'=> $request->job_title,
                'city'=> $request->city,
                'country'=> $request->country,
            ]);
            $contact->save();
            return response()->json([
                'code'=>200,
                'status'=> TRUE,
                'message'=>'Successfully created',
                'data'=> $contact,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'code'=>400,
                'status'=> FALSE,
                'message'=>'Failed created'
            ]);
        }
        
        
        
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
}
