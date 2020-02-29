<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Image;
use App\Section;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name,$image,$content)
    {
        $title = str_replace('-',' ',$name);
        $title = "Listado de ". ucfirst($title);
        $show_image= $image == 'withImage' ? true : false;
        $show_content = $content == 'withContent' ? true: false;
        $section = Section::where('name',$name)->orderBy('order','ASC')->get();
        return view('admin.section.index')
        ->with('image',$image)
        ->with('content',$content)
        ->with('show_image',$show_image)
        ->with('show_content',$show_content)
        ->with('name',$name)
        ->with('title',$title)
        ->with('section',$section)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name,$image,$content)
    {
        $show_image= $image == 'withImage' ? true : false;
        $title = str_replace('-',' ',$name);
        $title = "Elemento del Listado de ".$name;
        return view('admin.section.create')
        ->with('image',$image)
        ->with('content',$content)
        ->with('show_image',$show_image)
        ->with('name',$name)
        ->with('title',$title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSectionRequest $request,ImageService $imageService)
    {

        DB::beginTransaction();
            try{
                $section = new Section($request->only(['title','subtitle','content','name']));
                $section->save();
                if($request->file('image') !== null){
                    $image = $imageService->storageImage($request->file('image'));
                    if($image !== 'error'){
                        if($section->image !== null){
                            $previous_image = $section->image->url;
                            $section->image()->update(['url' => $image]);
                            $imageService->deleteImage('images/'.$previous_image);
                        }else{
                            $section->image()->save( new Image(['url'=> $image]));
                        }
                        $section->save();
                    }else{
                        DB::rollback();
                        return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                    }
                }
                $section->save();
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
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit($name,$image,$content,Section $section)
    {
        $show_image= $image == 'withImage' ? true : false;
        $title = str_replace('-',' ',$name);
        $title = "Elemento del Listado de ".$name;
        return view('admin.section.edit')
        ->with('image',$image)
        ->with('content',$content)
        ->with('show_image',$show_image)
        ->with('name',$name)
        ->with('section',$section)
        ->with('title',$title);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSectionRequest $request,ImageService $imageService)
    {
        DB::beginTransaction();
            try{
                $section = Section::find($request->id);
                $section->content = $request->content;
                $section->title = $request->title;
                $section->subtitle = $request->subtitle;
                if($request->file('image') !== null){
                    $image = $imageService->storageImage($request->file('image'));
                    if($image !== 'error'){
                        if($section->image !== null){
                            $previous_image = $section->image->url;
                            $section->image()->update(['url' => $image]);
                            $imageService->deleteImage('images/'.$previous_image);
                        }else{
                            $section->image()->save( new Image(['url'=> $image]));
                        }
                        $section->save();
                    }else{
                        DB::rollback();
                        return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                    }
                }
                $section->save();
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
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ImageService $imageService)
    {
        DB::beginTransaction();
            try{
                $section = Section::where('id',$request->id)->with('image')->first();
                if($section->image != null){
                    $image = $section->image->url;
                    $imageService->deleteImage('images/'.$image);
                }

                $section->delete();
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
    public function sort($name,$image,$content)
    {
        $show_image= $image == 'withImage' ? true : false;
        $title = str_replace('-',' ',$name);
        $title = "Ordenar el listado de ". ucfirst($title);
        $section = Section::where('name',$name)->orderBy('order','ASC')->get();
        if($show_image){

            $section = Section::where('name',$name)->orderBy('order','ASC')->with('image')->get();
        }

        return view('admin.section.sort')
        ->with('name',$name)
        ->with('image',$image)
        ->with('content',$content)
        ->with('show_image',$show_image)
        ->with('section',$section)
        ->with('title',$title)
        ;
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

                    $item = Section::find($elemento[0]);
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
