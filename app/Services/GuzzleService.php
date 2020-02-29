<?php
namespace App\Services;
use Illuminate\Support\Facades\Log;
use GuzzleHttp\Exception as GuzzleException;
class GuzzleService{
    private $client;
    public function __construct(){
        $this->client = new \GuzzleHttp\Client();
    }
    /*
    @params
    String $endPoint
    Array $params
    */
    public function get($endPoint, $params= null){
        try{
            $response = $this->client->get($endPoint);
            return json_decode((string) $response->getBody(), true);
            }catch(GuzzleException $e){
                Log::warning("GuzzleException:". $e->getMessage());
                return null;
            }catch(\Exception $e){
                Log::warning("Exception:". $e->getMessage());
                return null;
            }
    }

    public function post($endPoint,$params = null){
        try{
            $response = $this->client->post($endPoint,['form_params'=>$params]);
            return json_decode((string) $response->getBody(), true);
            }catch(GuzzleException $e){
                Log::warning("GuzzleException Modules:". $e->getMessage());
                return null;
            }catch(\Exception $e){
                Log::warning("Exception Modules:". $e->getMessage());
                return null;
            }
    }

}
