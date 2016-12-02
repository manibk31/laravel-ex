<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use App\ds_plan;

class PlanController extends Controller
{
    //
    
    function postPlan(Request $request)
    {
        $plan= new ds_plan;
        $plan->planname=$request->input('planname');
        $plan->item1=$request->input('item1');
        $plan->quantity1=$request->input('quantity1');
        $plan->item2=$request->input('item2');
        $plan->quantity2=$request->input('quantity2');
        $plan->item3=$request->input('item3');
        $plan->quantity3=$request->input('quantity3');
        $plan->save();
        return redirect()->route('/')->with('info','Plan added succesfully');
    }
    function getPlans()
    {
        $plan= new ds_plan;
        $plan_count=$plan::count();
        $plans=null;
        if($plan_count==1)
        {
            $plans=$plan::first();
        }
        else if($plan_count>1)
        {
            $plans=$plan::get();
        }
        return view('welcome')->with('plans',$plans)->with('plan_count',$plan_count);
    }   
    function deletePlan($plan_id)
    {
        $plan=new ds_plan;
        $plan_to_delete=$plan::where('id',$plan_id);
        $plan_to_delete->delete();
        
        return redirect()->route('/')->with('info','Plan Deleted!');
    }
}
