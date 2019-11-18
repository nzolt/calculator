<?php

namespace App\Http\Controllers;

use App\Data\DataFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

/**
 * @OA\Info(title="Calculator API", version="1.0.0")
 */
class CalculatorController extends Controller
{
    /**
     * Create the CalculatorController form
     */
    public function createAction()
    {
        return view('calculator');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response|int|mixed|string
     */
    public function calculateAction(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'valuea'    => 'numeric|required',
                'valueb'    => 'numeric|required',
                'operator'  => 'required|in:add,sub,mul,div,and,or,xor'
            ],[
                'valuea.numeric' => 'Value A must be numeric',
                'valuea.required' => 'Value A can not be empty',
                'valueb.numeric' => 'Value B must be numeric',
                'valueb.required' => 'Value B can not be empty',
            ]);

            if ($validator->fails()) {
                return implode('<br/>', $validator->errors()->all());
            }

            $dataObj = DataFactory::make($data);

            return $dataObj->calculate();
        } else{
            return response('Unauthorized.', 401);
        }

    }
}
