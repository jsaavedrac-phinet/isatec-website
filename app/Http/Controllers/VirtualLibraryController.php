<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Book;
use App\StaticSection;
use App\Tag;
use App\Virtual_Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VirtualLibraryController extends Controller
{
    public function index(){
        $bienvenida = StaticSection::where('name','bienvenida-biblioteca-virtual')->first();
        $tags = DB::table('tags')
        ->join('taggables','tags.id','=','taggables.tag_id')
        ->join('virtual__books','taggables.taggable_id','=','virtual__books.id')
        ->select(array('tags.*', DB::raw('COUNT(tags.id) as total')))
        ->where('taggables.taggable_type','=','App\Virtual_Book')
        ->orderBy('tags.name','ASC')
        ->groupBy('tags.id')
        ->get();

        return view('virtual-library.index')
        ->with('bienvenida',$bienvenida)
        ->with('tags',$tags)
        ;
    }

    public function byTag(Tag $tag){
        $books = Virtual_Book::whereHas('tags',function($q) use ($tag){
            $q->where('taggables.tag_id','=',$tag->id);
        })->with('image')->orderBy('title','ASC')->get();
        $tags = DB::table('tags')
        ->join('taggables','tags.id','=','taggables.tag_id')
        ->join('virtual__books','taggables.taggable_id','=','virtual__books.id')
        ->select(array('tags.*', DB::raw('COUNT(tags.id) as total')))
        ->where('taggables.taggable_type','=','App\Virtual_Book')
        ->orderBy('tags.name','ASC')
        ->groupBy('tags.id')
        ->get();
        return view('virtual-library.tag')
        ->with('books',$books)
        ->with('tag',$tag)
        ->with('tags',$tags)
        ;
    }

    public function book($slug){
        $book = Virtual_Book::where('slug',$slug)->with('tags')->with('image')->first();
        if($book == null){
            return redirect()->route('virtual-library.index');
        }
        $tags = DB::table('tags')
        ->join('taggables','tags.id','=','taggables.tag_id')
        ->join('virtual__books','taggables.taggable_id','=','virtual__books.id')
        ->select(array('tags.*', DB::raw('COUNT(tags.id) as total')))
        ->where('taggables.taggable_type','=','App\Virtual_Book')
        ->orderBy('tags.name','ASC')
        ->groupBy('tags.id')
        ->get();

        return view('virtual-library.book')
        ->with('book',$book)
        ->with('tags',$tags)
        ;
    }

    public function books(){
        $bienvenida = StaticSection::where('name','bienvenida-biblioteca-virtual')->first();
        $tags = DB::table('tags')
        ->join('taggables','tags.id','=','taggables.tag_id')
        ->join('books','taggables.taggable_id','=','books.id')
        ->select(array('tags.*', DB::raw('COUNT(tags.id) as total')))
        ->where('taggables.taggable_type','=','App\Book')
        ->orderBy('tags.name','ASC')
        ->groupBy('tags.id')
        ->get();
        $books = Book::orderBy('title','ASC')->get();
        return view('virtual-library.books')
        ->with('bienvenida',$bienvenida)
        ->with('tags',$tags)
        ->with('books',$books)
        ;
    }

    public function booksByTag(Tag $tag){
        $books = Book::whereHas('tags',function($q) use ($tag){
            $q->where('taggables.tag_id','=',$tag->id);
        })->orderBy('title','ASC')->get();
        $tags = DB::table('tags')
        ->join('taggables','tags.id','=','taggables.tag_id')
        ->join('books','taggables.taggable_id','=','books.id')
        ->select(array('tags.*', DB::raw('COUNT(tags.id) as total')))
        ->where('taggables.taggable_type','=','App\Book')
        ->orderBy('tags.name','ASC')
        ->groupBy('tags.id')
        ->get();
        return view('virtual-library.booksByTag')
        ->with('books',$books)
        ->with('tag',$tag)
        ->with('tags',$tags)
        ;
    }

}
