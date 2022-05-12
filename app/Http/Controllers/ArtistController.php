<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;

use App\Models\Artist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Artist::orderBy("likes", "desc")->get();
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArtistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArtistRequest $request)
    {
        try {
            $artist = new Artist();
            $artist->name = $request->name;
            $artist->email = $request->email;
            $artist->mobile = $request->mobile;
            $artist->brand_name = $request->brand_name;
            $artist->genre = $request->genre;
            $artist->location = $request->location;
            $artist->save();

            return response()->json(["success" => true, "msg" => 'Artist created successfully']);
        } catch (Exception $e) {
            return response()->json(["success" => false, "msg" => 'Oops.. Some error occured. Please try again!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        try {
            $artist = Artist::find($artist);

            if($artist)
                return response()->json(["success" => true, "data" => $artist]);
            else
                return response()->json(["success" => false, "msg" => 'Invalid artist request!']);
        } catch (Exception $e) {
            return response()->json(["success" => false, "msg" => 'Oops.. Some error occured. Please try again!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArtistRequest  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        try {
            $artist = Artist::find($artist)[0];
            $artist->name = $request->name;
            $artist->email = $request->email;
            $artist->mobile = $request->mobile;
            $artist->brand_name = $request->brand_name;
            $artist->genre = $request->genre;
            $artist->location = $request->location;
            $artist->save();

            return response()->json(["success" => true, "msg" => 'Artist updated successfully']);
        } catch (Exception $e) {
            return response()->json(["success" => false, "msg" => 'Oops.. Some error occured. Please try again!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
    }

    /**
     * Update the like the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function like(Artist $artist)
    {
        try {
            $artist = Artist::find($artist)[0];
            $artist->likes += 1;
            $artist->save();

            return response()->json(["success" => true, "msg" => 'Artist liked successfully']);
        } catch (Exception $e) {
            return response()->json(["success" => false, "msg" => 'Oops.. Some error occured. Please try again!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function dislike(Artist $artist)
    {
        try {
            $artist = Artist::find($artist)[0];
            $artist->dislikes += 1;
            $artist->save();

            return response()->json(["success" => true, "msg" => 'Artist disliked successfully']);
        } catch (Exception $e) {
            return response()->json(["success" => false, "msg" => 'Oops.. Some error occured. Please try again!']);
        }
    }
}
