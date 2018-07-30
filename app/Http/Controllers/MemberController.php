<?php

namespace App\Http\Controllers;

use App\Members;
use Illuminate\Http\Request;

class MemberController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:members',
            'phone' => 'required|numeric'
        ]);
        $member = new Members([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
        $member->save();
        return response()->json([
            'message' => 'Successfully created member!'
        ], 201);
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
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function show(Members $members)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function edit(Members $members)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|numeric'
        ]);

        $member = Members::find($id);
        $member->name = $request->name;
        $member->email = $request->email;
        $member->phone = $request->phone;
        $member->save();

        return response()->json([
            'message' => 'Successfully updated member!'
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Members  $members
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Members::find($id);
        $member->delete();

        return response()->json([
            'message' => 'Successfully deleted member!'
        ], 201);
    }
}
