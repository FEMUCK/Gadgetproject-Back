<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Carousel;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousel = Carousel::all();
        return response()->json($carousel);
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

        $validatedData = $request->validate([
            'carouselName' => 'required',
            'imageName' => 'required',
        ]);  

        $carousel = new Carousel;
        $carousel->name = $request->get('carouselName');
        $carousel->arrange = $request->get('carouselArrange');
        $carousel->link = $request->get('carouselLink');
        $carousel->image = $request->get('imageName');
        $carousel->save();
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
        $carousel = Carousel::find($id);
        return response()->json($carousel);
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
        $validatedData = $request->validate([
            'carouselName' => 'required',
            'imageName' => 'required',
        ]);  

        $carousel = Carousel::find($id);
        $carousel->name = $request->get('carouselName');
        $carousel->arrange = $request->get('carouselArrange');
        $carousel->link = $request->get('carouselLink');
        $carousel->image = $request->get('imageName');
        $carousel->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carousel = Carousel::find($id);
        $carousel->delete();

        $carouselList = Carousel::all();
        return response()->json($carouselList);
    }
}
