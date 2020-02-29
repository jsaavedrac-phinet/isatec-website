<?php

namespace App\Http\Controllers\Dashboard;

use App\Banner;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateOrUpdateBannerRequest;
use App\Image;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        $title = str_replace('-',' ',$name);
        $title = 'Banner: '. ucfirst($title);
        $banner = Banner::where('name',$name)->first();
        return view('admin.banner.index')
        ->with('title',$title)
        ->with('name',$name)
        ->with('banner',$banner);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrUpdateBannerRequest $request, ImageService $imageService)
    {
        DB::beginTransaction();
            try{
                $banner = Banner::updateOrCreate(
                    ['name' => $request->name],
                    ['content'=> $request->content]
                );
                if($request->file('image') !== null){
                    $image = $imageService->storageImage($request->file('image'));
                    if($image !== 'error'){
                        if($banner->image !== null){
                            $previous_image = $banner->image->url;
                            $banner->image()->update(['url' => $image]);
                            $imageService->deleteImage('images/'.$previous_image);
                        }else{
                            $banner->image()->save( new Image(['url'=> $image]));
                        }
                        $banner->save();
                    }else{
                        DB::rollback();
                        return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                    }
                }
                $banner->save();
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
