<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateStaticSectionRequest;
use App\Image;
use App\Services\ImageService;
use App\StaticSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StaticSectionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name,$type)
    {
        $title = str_replace('-',' ',$name);
        $title = ucfirst($title);
        $show_image= $type == 'withImage' ? true : false;
        $staticSection = StaticSection::where('name',$name)->first();
        return view('admin.staticSection.index')
        ->with('title',$title)
        ->with('show_image',$show_image)
        ->with('name',$name)
        ->with('staticSection',$staticSection);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateStaticSectionRequest $request,ImageService $imageService)
    {
        DB::beginTransaction();
            try{
                $staticSection = StaticSection::updateOrCreate(
                    ['name' => $request->name],
                    ['content'=> $request->content,
                    'title' => $request->title,
                    'subtitle' => $request->subtitle]
                );
                if($request->file('image') !== null){
                    $image = $imageService->storageImage($request->file('image'));
                    if($image !== 'error'){
                        if($staticSection->image !== null){
                            $previous_image = $staticSection->image->url;
                            $staticSection->image()->update(['url' => $image]);
                            $imageService->deleteImage('images/'.$previous_image);
                        }else{
                            $staticSection->image()->save( new Image(['url'=> $image]));
                        }
                        $staticSection->save();
                    }else{
                        DB::rollback();
                        return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                    }
                }
                $staticSection->save();
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
}
