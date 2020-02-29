<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Image;
use App\Post;
use App\Services\ImageService;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        $posts = Post::where('name',$name)->orderBy('date','DESC')->get();
        $title = str_replace('-',' ',$name);
        $title = "Listado de ". ucfirst($title);
        return view('admin.post.index')
        ->with('posts',$posts)
        ->with('name',$name)
        ->with('title',$title)
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($name)
    {
        $title = str_replace('-',' ',$name);
        $title = "Elemento del listado de ". ucfirst($title);
        $tags = Tag::orderBy('name','ASC')->get();
        return view('admin.post.create')
        ->with('name',$name)
        ->with('tags',$tags)
        ->with('title',$title)
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request, ImageService $imageService)
    {
        DB::beginTransaction();
        try{
            $post =  new Post();
            $post->name = $request->name;
            $post->date = $request->date;
            $post->title= $request->title;
            $post->content = $request->content;
            $post->save();

            if($request->file('image') !== null){
                $image = $imageService->storageImage($request->file('image'));
                if($image !== 'error'){
                    if($post->image !== null){
                        $previous_image = $post->image->url;
                        $post->image()->update(['url' => $image]);
                        $imageService->deleteImage('images/'.$previous_image);
                    }else{
                        $post->image()->save( new Image(['url'=> $image]));
                    }
                    $post->save();
                }else{
                    DB::rollback();
                    return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                }
            }

            if($request->tags != null){
                foreach ($request->tags as $tag) {
                    if (!is_numeric($tag)) {
                        $nombre = Tag::search($tag)->first();
                        if ($nombre == null) {
                            $nuevo_tag = new Tag();
                            $nuevo_tag->name = strtoupper($tag);
                            $nuevo_tag->save();
                            $tag = $nuevo_tag;
                        }else{
                            $tag = $nombre;
                        }
                    }else{
                        $tag = Tag::find($tag);
                    }
                    $post->tags()->save($tag);
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
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($name,Post $post)
    {
        $title = str_replace('-',' ',$name);
        $title = "Elemento del listado de ". ucfirst($title);
        $tags = Tag::orderBy('name','asc')->get();
        return view('admin.post.edit')
        ->with('name',$name)
        ->with('post',$post)
        ->with('title',$title)
        ->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, ImageService $imageService)
    {
        DB::beginTransaction();
        try{
            $post = Post::find($request->id);
            $post->date = $request->date;
            $post->title= $request->title;
            $post->subtitle= $request->subtitle;
            $post->content = $request->content;
            $post->save();

            if($request->file('image') !== null){
                $image = $imageService->storageImage($request->file('image'));
                if($image !== 'error'){
                    if($post->image !== null){
                        $previous_image = $post->image->url;
                        $post->image()->update(['url' => $image]);
                        $imageService->deleteImage('images/'.$previous_image);
                    }else{
                        $post->image()->save( new Image(['url'=> $image]));
                    }
                    $post->save();
                }else{
                    DB::rollback();
                    return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                }
            }
            $post->tags()->detach();
            $post->tags()->delete();
            if($request->tags != null){
                foreach ($request->tags as $tag) {
                    if (!is_numeric($tag)) {
                        $nombre = Tag::search($tag)->first();
                        if ($nombre == null) {
                            $nuevo_tag = new Tag();
                            $nuevo_tag->name = strtoupper($tag);
                            $nuevo_tag->save();
                            $tag = $nuevo_tag;
                        }else{
                            $tag = $nombre;
                        }
                    }else{
                        $tag = Tag::find($tag);

                    }
                    $post->tags()->save($tag);
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, ImageService $imageService)
    {
        DB::beginTransaction();
            try{
                $post = Post::where('id',$request->id)->with('image')->first();
                $image = $post->image->url;
                $imageService->deleteImage('images/'.$image);
                $post->delete();
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
