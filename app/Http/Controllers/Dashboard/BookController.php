<?php

namespace App\Http\Controllers\Dashboard;

use App\Book;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books=Book::orderBy('title','ASC')->get();
        $title= 'Listado de Libros Físicos';
        return view('admin.book.index')
        ->with('title',$title)
        ->with('books',$books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Elemento del listado de Libros Físicos";
        $tags = Tag::orderBy('name','ASC')->get();
        return view('admin.book.create')
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
    public function store(CreateBookRequest $request)
    {
        DB::beginTransaction();
        try{
            $book =  new Book();

            $book->title= $request->title;
            $book->total = $request->total;
            $book->available = $request->available == '' ? $request->total : $request->available;
            $book->author = $request->author;

            $book->save();

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $title = "Elemento del listado de Libros Físicos";
        $tags = Tag::orderBy('name','asc')->get();
        return view('admin.book.edit')
        ->with('book',$book)
        ->with('title',$title)
        ->with('tags',$tags);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        DB::beginTransaction();
        try{
            $book = Book::find($request->id);
            $book->title= $request->title;
            $book->author = $request->author;
            $book->total = $request->total;
            $book->available = $request->available;
            $book->save();

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        DB::beginTransaction();
            try{
                $book = Book::where('id',$request->id)->first();
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
