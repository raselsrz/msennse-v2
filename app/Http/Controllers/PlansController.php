<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plans;

class PlansController extends Controller
{
    //

    public function index()
    {

        $type= "plans";
        $name= 'Subscription';

        $plans = Plans::orderBy('id', 'desc')->paginate(10);
        
        return view('admin.pages.plan.index', compact('plans','name'));
    }


    //add plan
    public function add()
    {

        $name = 'Add Subscription';
        $type = 'plan';


        return view('admin.pages.plan.add', compact('name', 'type'));
    }


    //store plan
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'duration_days' => 'required',
        ]);

        $plan = new Plans();
        $plan->name = $request->name;
        $plan->price = $request->price;
        $plan->duration_days = $request->duration_days;
        $plan->save();

        //daily_work
        $daily_work= $request->daily_work;
        if($daily_work){
            update_field('daily_work', $daily_work, 'plan', $plan->id);
        }

        $total_price= $request->total_price;
        if($total_price){
            update_field('total_price', $total_price, 'plan', $plan->id);
        }


        return redirect()->route('admin.plans.edit', $plan->id)->with('success', 'Subscription added successfully');
    }

    //edit
    public function edit($id)
    {
        $name = "Edit Subscription";
        $plans = plans::find(id: $id);
        return view('admin.pages.plan.edit', compact('plans', 'name'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
        ]);

        $plan = plans::find($id);
        $plan->update($request->all());

        $daily_work= $request->daily_work;
        if($daily_work){
            update_field('daily_work', $daily_work, 'plan', $plan->id);
        }

        $total_price= $request->total_price;
        if($total_price){
            update_field('total_price', $total_price, 'plan', $plan->id);
        }


        return redirect()->route('admin.plans.edit', $plan->id)->with('success', 'Subscription update successfully');
    }


    //approve
    public function approve(Request $request, $id)
    {
        $plan = plans::find($id);
        $plan->status = $request->status;
        $plan->save();
        return redirect()->route('admin.plans.index')->with('success', 'Subscription approved successfully');
    }


    //delete
    public function delete($id)
    {
        $plan = plans::find($id);
        $plan->delete();
        return redirect()->route('admin.plans.index')->with('success', 'Subscription deleted successfully');
    }




}
