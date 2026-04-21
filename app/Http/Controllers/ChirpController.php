<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirps = [
            [
                'author' => 'Rincewind',
                'message' => 'Can anybody hear me',
                'time' => '5 minutes ago'
            ],
            [
                'author' => 'Slamdunk Johnson',
                'message' => 'I\'m learning Excel! Do you know Excel?',
                'time' => '1 hour ago'
            ],
            [
                'author' => 'Grognor the Relentless',
                'message' => 'Hmmm',
                'time' => '3 hours ago'
            ]
        ];

        return view("home", ['chirps' => $chirps]);
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
        //
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
        //
    }
}
