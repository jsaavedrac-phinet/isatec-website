<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSliderRequest;
use App\Image;
use App\Services\ImageService;
use App\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('order','ASC')->get();
        return view('admin.sliders.view')->with('sliders',$sliders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, ImageService $imageService)
    {
        DB::beginTransaction();
        try{
            $slider = new Slider();
            $slider->style = $request->style;
            $slider->order = Slider::count() + 1;
            $slider->content = $request->content;
            $slider->save();
            if($request->file('image') !== null){
                $image = $imageService->storageImage($request->file('image'));
                if($image !== 'error'){
                    if($slider->image !== null){
                        $previous_image = $slider->image->url;
                        $slider->image()->update(['url' => $image]);
                        $imageService->deleteImage('images/'.$previous_image);
                    }else{
                        $slider->image()->save( new Image(['url'=> $image]));
                    }
                    $slider->save();
                }else{
                    DB::rollback();
                    return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                }
            }
            DB::commit();
            return response()->json(["message"=>"Se ha guardado con éxito"]);
        }catch (\Illuminate\Database\QueryException $e) {
            DB::rollback();
            return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: ".$e->getMessage()."</h5>","type" => "error"]);
        }
        catch(\Exception $e){
            return response()->json(["message"=>"Ha ocurrido un error : ".$e->getMessage(),"type" => "error"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit')->with('slider',$slider);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request, Slider $slider, ImageService $imageService)
    {
        DB::beginTransaction();
            try{
                $slider->content = $request->content;
                $slider->style = $request->style;
                if($request->file('image') !== null){
                    $image = $imageService->storageImage($request->file('image'));
                    if($image !== 'error'){
                        if($slider->image !== null){
                            $previous_image = $slider->image->url;
                            $slider->image()->update(['url' => $image]);
                            $imageService->deleteImage('images/'.$previous_image);
                        }else{
                            $slider->image()->save( new Image(['url'=> $image]));
                        }
                        $slider->save();
                    }else{
                        DB::rollback();
                        return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                    }
                }
                $slider->save();
                DB::commit();
                return response()->json(["message"=>"Se ha guardado con éxito"]);
            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: ".$e->getMessage()."</h5>","type" => "error"]);
            }
            catch(\Exception $e){
                return response()->json(["message"=>"Ha ocurrido un error : ".$e->getMessage(),"type" => "error"]);
            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ImageService $imageService)
    {
        DB::beginTransaction();
            try{
                $slider = Slider::where('id',$request->id)->with('image')->first();
                $image = $slider->image->url;
                $imageService->deleteImage('images/'.$image);
                $slider->delete();
                DB::commit();
                return response()->json(["message"=>"Se ha eliminado con éxito"]);
            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: ".$e->getMessage()."</h5>","type" => "error"]);
            }
            catch(\Exception $e){
                return response()->json(["message"=>"Ha ocurrido un error : ".$e->getMessage(),"type" => "error"]);
            }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sort()
    {
        $sliders = Slider::orderBy('order','ASC')->with('image')->get();
        return view('admin.sliders.sort')->with('sliders',$sliders);
    }
    /**
     * Order a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        if ($request->nuevas_filas == "") {
        return response()->json(["message"=>"No han ocurrido cambios","tipo" => "error","recargar"=>false]);
        }else{
            DB::beginTransaction();
            try{
            foreach (json_decode($request->nuevas_filas) as $elemento) {

                    $item = Slider::find($elemento[0]);
                    $item->order = $elemento[1];
                    $item->save();
            }
            DB::commit();
            return response()->json(["message"=>"Se realizaron los cambios"]);
            }catch (\Illuminate\Database\QueryException $e) {
                DB::rollback();
                return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: ".$e->getMessage()."</h5>","type" => "error"]);
            }
            catch(\Exception $e){
                return response()->json(["message"=>"Ha ocurrido un error : ".$e->getMessage(),"type" => "error"]);
            }
        }

    }
}
