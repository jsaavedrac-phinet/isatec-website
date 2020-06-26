<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Http\Requests\CreatePreRegisterRequest;
use App\Post;
use App\PreRegistration;
use App\Program;
use App\Section;
use App\Slider;
use App\StaticSection;
use DateTime;
use Illuminate\Http\Request;
use App\Services\GuzzleService;
use App\Student;
use App\UserStudent;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class WebController extends Controller
{
    public function index(){
        $slides = Slider::orderBy('order','ASC')->with('image')->get();
        $bienvenida = StaticSection::where('name','bienvenida-index')->with('image')->first();
        $publicaciones = Post::where('name','publicaciones')->orderBy('date','DESC')->get();
        $servicios = Section::where('name','servicios')->orderBy('order','ASC')->with('image')->get();
        $reconocimientos = Section::where('name','reconocimientos')->orderBy('order','ASC')->with('image')->take(2)->get();
        return view('web.index')
        ->with('slides',$slides)
        ->with('bienvenida',$bienvenida)
        ->with('publicaciones',$publicaciones)
        ->with('servicios',$servicios)
        ->with('reconocimientos',$reconocimientos)
        ;
    }

    public function about(){
        $banner = Banner::where('name','nosotros')->with('image')->first();
        $about = StaticSection::where('name','quienes-somos')->with('image')->first();
        $historia = StaticSection::where('name','nuestra-historia')->with('image')->first();
        $mision = StaticSection::where('name','mision')->first();
        $vision = StaticSection::where('name','vision')->first();
        $valores = Section::where('name','valores')->orderBy('order','ASC')->get();
        return view('web.about')
        ->with('banner',$banner)
        ->with('about',$about)
        ->with('historia',$historia)
        ->with('mision',$mision)
        ->with('vision',$vision)
        ->with('valores',$valores)
        ;
    }

    public function program($slug, GuzzleService $guzzleService){
        $program =$guzzleService->get(config('app.url_api').'program/'.$slug.'/details');
        if($program != null){
            $modules = $guzzleService->post(config('app.url_api').'modules',
                [
                    'curricular_plan_id' =>$program['curricular_plan']['id']
                ]
            );
            $schedules = $guzzleService->get(config('app.url_api').'shedules');
            $banner = Banner::where('name',$slug)->first();

            return view('web.program')
            ->with('program',$program)
            ->with('banner',$banner)
            ->with('modules',$modules)
            ->with('schedules',$schedules)
            ;
        }
        return redirect(route('web.home'));

    }

    public function clients(){
        $banner = Banner::where('name','clientes')->first();
        $bienvenida = StaticSection::where('name','bienvenida-clientes')->with('image')->first();
        $clientes = Section::where('name','clientes')->with('image')->orderBy('order','ASC')->get();
        return view('web.clients')
        ->with('bienvenida',$bienvenida)
        ->with('clientes',$clientes)
        ->with('banner',$banner)
        ;
    }

    public function posts($name){
        $banner = Banner::where('name','blog')->with('image')->first();
        $posts = Post::where('name',$name)->with('image')->orderBy('date','DESC')->get();

        return view('web.posts')
        ->with('banner',$banner)
        ->with('name',$name)
        ->with('posts',$posts)
        ;
    }

    public function post($name,Post $post){
        $banner = Banner::where('name','blog')->with('image')->first();

        return view('web.post')
        ->with('banner',$banner)
        ->with('post',$post)
        ->with('name',$name)

        ;
    }
    public function contact(){
        $banner = Banner::where('name','contactenos')->with('image')->first();
        return view('web.contact')->with('banner',$banner);
    }

    public function send_email(Request $request){
        $datos =array('nombre'=>$request->nombre,'email'=>$request->email,'mensaje'=>$request->mensaje);
         try{

            Mail::send('emails.contacto', $datos, function($message) use ($datos) {
               $cc = config('app.email_to');
               $message->to($cc,'Informes ISATEC')->subject($datos['nombre']);

               $message->from(config('mail.username'),'Pagina Web');
            });

            return response()->json(["rpta"=> "1"]);
         }
         catch(\Exception $e){
            return response()->json(["rpta"=> "error: ".$e]);
         }
    }

    public function admision(){
        return view('web.admision');
    }

    public function pre_register(CreatePreRegisterRequest $request,GuzzleService $guzzleService){
        DB::connection('pgsql2')->beginTransaction();
        try{
            $student = Student::find($request->student_id);
            $program = Program::find($request->program_id);
            if($student == null){
                $user = new UserStudent();
                $user->name = $request->name;
                $user->lastname = $request->lastname .' '. $request->mothers_lastname;
                $user->username = $request->code.' '.$program->first_letter;
                $user->password =bcrypt($request->code);
                $user->role = 3;
                $user->status =0;
                $user->save();

                $student = new Student();
                $student->name = $request->name;
                $student->lastname = $request->lastname;
                $student->mothers_lastname = $request->mothers_lastname;
                $student->email = $request->email;
                $student->type_phone = $request->type_phone;
                $student->phone = $request->phone;
                $student->sex = $request->sex;
                $student->program_id = $request->program_id;
                $student->type_identification = $request->type_identification;
                $student->identification_number= $request->identification_number;
                $student->code = $request->code;
                $student->codeprogram = $request->codeprogram;
                $student->curricular_plan_id = $request->curricular_plan_id;
                $student->user_id = $user->id;
                $student->save();
            }else{

                $user = UserStudent::find($student->user_id);
            }

            $pre_registration = new  PreRegistration();
            $pre_registration->code = $request->code;
            $pre_registration->registration_date = date('yy-m-d');
            $pre_registration->student_id = $student->id;
            $pre_registration->cycle_id = $request->cycle_id;
            $pre_registration->turn_id = $request->turn_id;
            $pre_registration->save();

            $datos = array('name'=> $request->name,'email'=> $request->email,'turn' => $request->turn_id == 1 ? 'MAÑANA' : $request->turn_id == 2 ? 'TARDE' : 'NOCHE','program' => $program->name);
            try{

                Mail::send('emails.admision', $datos, function($message) use ($datos) {

                   $message->to($datos['email'])->subject('ISATEC');

                   $message->from(config('mail.username'),'ISATEC: Pre Inscripción');
                });

             }
             catch(\Exception $e){
                 DB::connection('pgsql2')->rollback();
                return response()->json(["message"=> "error: ".$e->getMessage(),'type' => 'error']);
             }

             DB::connection('pgsql2')->commit();
             $guzzleService->post(config('app.url_api').'pre_registration',['id'=> $pre_registration->id]);
            return response()->json(['message' => 'Te has pre-registrado exitosamente.<br><br>Te hemos enviando un correo a : '.$request->email.'.<br><br><h5>No olvides revisar tu <strong>SPAM</strong> si es que no encuentras el correo.</h5>','function' => 'reset_form']);
        }catch(QueryException $e){
            DB::connection('pgsql2')->rollBack();
            return response()->json(['message' => 'Ha ocurrido un error.<br><h5>Error : '.$e->getMessage().'</h5>','type' => 'error']);
        }catch(Exception $e){
            DB::connection('pgsql2')->rollBack();
            return response()->json(['message' => 'Ocurrió un error.<br><h5>Error : '.$e->getMessage().'</h5>','type' => 'error']);
        }
    }


}
