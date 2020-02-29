<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Image;
use App\Services\ImageService;
use App\User;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function edit_profile(UpdateUserRequest $request, ImageService $imageService)
    {
            DB::beginTransaction();
            try {
                $user = User::where('user', Auth::user()->user)->first();
                $user->name = $request->name;
                $user->user = $request->user;

                if($request->file('image') !== null){
                    $image = $imageService->storageImage($request->file('image'));
                    if($image !== 'error'){
                        if($user->image !== null){
                            $previous_image = $user->image->url;
                            $user->image()->update(['url' => $image]);
                            $imageService->deleteImage('images/'.$previous_image);
                        }else{
                            $user->image()->save( new Image(['url'=> $image]));
                        }

                        $user->save();
                    }else{
                        DB::rollback();
                        return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: Driver de Imagen </h5>","type" => "error"]);
                    }
                }
                $login = false;
                if ($request->password != "") {
                    $user->password = bcrypt($request->password);
                    Auth::logout();
                    $login = true;
                }
                $user->save();

                DB::commit();
                return response()->json(["message"=>"Se ha realizado el cambio con éxito","tipo" => "success","recargar"=>false,"login"=>$login]);
            }catch (QueryException $e) {
                DB::rollback();
                return response()->json(["message"=>"Ocurrió un error en el procedimiento<br><h5>Error: ".$e->getMessage()."</h5>","type" => "error"]);
            }
            catch(\Exception $e){
                return response()->json(["message"=>"Ha ocurrido un error : ".$e->getMessage(),"type" => "error"]);
            }

    }
}
