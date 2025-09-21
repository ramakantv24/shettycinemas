<?php
namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use App\Models\User;
use App\Models\Tvdata;
use App\Models\Tvtype;
use App\Models\Grouptv;
use App\Models\Subgrouptv;


class TvController extends BaseController
{
   
    public function getTvInfo($tv_number,Request $request) { 
        $tv_number = $tv_number;
        if($tv_number){
            
          	$Tvdata = Tvdata::select('tv_data.*','group_tv.group_name as group_name','tv_type.tv_number as tv_number','tv_type.tv_name as tv_name')->leftjoin('group_tv','group_tv.id','=','tv_data.group_id')->leftjoin('tv_type','tv_type.id','=','tv_data.tv_type_id')->where('tv_type.tv_number',$tv_number)->orderBy('tv_data.id', 'desc')->get();  
			
			/* foreach($Tvdata as $key=>$value){				
				if(($value['type']=='Image') && (isset($value['value']))){
					$Tvdata[$key]['value'] = url("public/uploads/tvdata/".$value['value']);
				}
                if(($value['type']=='Video') && (isset($value['value']))){
					$Tvdata[$key]['value'] = url("public/uploads/video/".$value['value']);
				}
            } */
          
			$success['data']  =  $Tvdata;
            return $this->sendResponse($success, 'Successfully.');	
        }else{
            return $this->sendError('Unauthorised.', ['error'=>'Invalid request data!']);
        }
    }

    
  
  	
}