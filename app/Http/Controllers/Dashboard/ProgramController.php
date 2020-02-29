<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Services\GuzzleService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function index(GuzzleService $guzzleService){
        $programs = $guzzleService->post('https://www.davidpaico.tk/isatec/api/programs');
        $title = 'Gestion de los programas de estudio';
        return view('admin.programs.index')
        ->with('title',$title)
        ->with('programs',$programs);
    }
}
