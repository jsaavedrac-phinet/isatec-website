<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateVirtualBookRequest;
use App\Http\Requests\UpdateVirtualBookRequest;
use App\Image;
use App\Services\ImageService;
use App\Services\FileService;
use App\Tag;
use Illuminate\Http\Request;
use App\Virtual_Book;
use Illuminate\Support\Facades\DB;

class VirtualBookController extends Controller
{
    public function index(){
        $virtual_books=Virtual_Book::orderBy('title','ASC')->get();
        $title= 'Listado de Libros Virtuales';
        return view('admin.virtual-book.index')
        ->with('title',$title)
        ->with('virtual_books',$virtual_books);
    }

    public function create()
    {

        $title = "Elemento del listado de Libros Virtuales";
        $tags = Tag::orderBy('name','ASC')->get();
        return view('admin.virtual-book.create')
        ->with('tags',$tags)
        ->with('title',$title)
        ;
    }


    public function store(CreateVirtualBookRequest $request, ImageService $imageService, FileService $fileService)
    {
        DB::beginTransaction();
        try{
            $book =  new Virtual_Book();

            $book->title= $request->title;
            $book->contents = $request->contents;
            $book->year = $request->year;
            $book->collection = $request->collection;
            $book->author = $request->author;
            $book->url = 'loading';
            $book->save();

            if($request->file('image') !== null){
                $image = $imageService->storageImage($request->file('image'));
                if($image !== 'error'){
                    if($book->image !== null){
                        $previous_image = $book->image->url;
                        $book->image()->update(['url' => $image]);
                        $imageService->deleteImage('images/'.$previous_image);
                    }else{
                        $book->image()->save( new Image(['url'=> $image]));
                    }
                    $book->save();
                }else{
                    DB::rollback();
                    return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                }
            }

            if($request->file('url') != null){
                $file = $fileService->storageFile($request->file('url'));
                if($file !== 'error'){
                    if($book->url !== null){
                        $previous_file = $book->url;
                        $fileService->deleteFile('files/'.$previous_file);
                    }
                    $book->url = $file;
                    $book->save();
                }else{
                    DB::rollback();
                    return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Carga de Archivo </h5><br>".$file,"type" => "error"]);
                }
            }

            if($request->tags != null){
                foreach ($request->tags as $tag) {
                    if (!is_numeric($tag)) {
                        $nombre = Tag::search($tag)->first();
                        if ($nombre == null) {
                            $nuevo_tag = new Tag();
                            $nuevo_tag->name = mb_strtoupper($tag,'utf-8');;
                            $nuevo_tag->save();
                            $tag = $nuevo_tag;
                        }else{
                            $tag = $nombre;
                        }
                    }else{
                        $tag = Tag::find($tag);
                    }
                    $book->tags()->save($tag);
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

    public function edit(Virtual_Book $book)
    {
        $title = "Elemento del listado de Libros Virtuales";
        $tags = Tag::orderBy('name','asc')->get();
        return view('admin.virtual-book.edit')
        ->with('book',$book)
        ->with('title',$title)
        ->with('tags',$tags);
    }

    public function update(UpdateVirtualBookRequest $request, ImageService $imageService, FileService $fileService)
    {
        DB::beginTransaction();
        try{
            $book = Virtual_Book::find($request->id);
            $book->title= $request->title;
            $book->contents = $request->contents;
            $book->year = $request->year;
            $book->collection = $request->collection;
            $book->author = $request->author;
            $book->save();

            if($request->file('image') !== null){
                $image = $imageService->storageImage($request->file('image'));
                if($image !== 'error'){
                    if($book->image !== null){
                        $previous_image = $book->image->url;
                        $book->image()->update(['url' => $image]);
                        $imageService->deleteImage('images/'.$previous_image);
                    }else{
                        $book->image()->save( new Image(['url'=> $image]));
                    }
                    $book->save();
                }else{
                    DB::rollback();
                    return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                }
            }

            if($request->file('url') != null){
                $file = $fileService->storageFile($request->file('url'));
                if($file !== 'error'){
                    if($book->url !== null){
                        $previous_file = $book->url;
                        $fileService->deleteFile('files/'.$previous_file);
                    }
                    $book->url = $file;
                    $book->save();
                }else{
                    DB::rollback();
                    return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Carga de Archivo </h5><br>".$file,"type" => "error"]);
                }
            }
            $book->tags()->detach();
            $book->tags()->delete();
            if($request->tags != null){
                foreach ($request->tags as $tag) {
                    if (!is_numeric($tag)) {
                        $nombre = Tag::search($tag)->first();
                        if ($nombre == null) {
                            $nuevo_tag = new Tag();
                            $nuevo_tag->name = mb_strtoupper($tag,'utf-8');
                            $nuevo_tag->save();
                            $tag = $nuevo_tag;
                        }else{
                            $tag = $nombre;
                        }
                    }else{
                        $tag = Tag::find($tag);

                    }
                    $book->tags()->save($tag);
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

    public function destroy(Request $request, ImageService $imageService, FileService $fileService)
    {
        DB::beginTransaction();
            try{
                $book = Virtual_Book::where('id',$request->id)->with('image')->first();
                $image = $book->image->url;
                $imageService->deleteImage('images/'.$image);
                $fileService->deleteFile('files/'.$book->url);
                $book->delete();
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
}
