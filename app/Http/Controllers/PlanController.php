<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Plan;
use App\Models\UserSubscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class PlanController extends Controller
{
    function index()
    {
        $plans = Plan::get();
        return view('admin.plan.index', compact('plans'));
    }

    function update(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        Plan::findOrFail($request->id)->update($validatedData);
        return redirect()->back()->with('success', 'Plan updated successfully.');
    }


    function selectPlan($category)
    {
        // return decrypt($category);
        $category = Category::where('title', decrypt($category))->firstOrFail();
        $plans = Plan::with('points')->where('category_id', $category->id)->where('price', '!=', 0)->get();
        return view('website.pages.select-plan', compact('plans'));
    }
    function selectedPlan(Request $request) {
        // return $request->all();
        $data = [
            'currency' => $request->currency,
            'plan_id' => $request->plan_id,
            'amount' => $request->amount,
        ];
        $encryptedData = Crypt::encryptString(json_encode($data));
        return redirect('payment/' . urlencode($encryptedData));
    }
    function payment($data)
    {
        $decryptString = Crypt::decryptString($data);
        $data = json_decode($decryptString);
        $plan = Plan::findOrFail($data->plan_id);
        return view('website.pages.payment', compact('plan','data'));
    }
    public function cancelSubscription(Request $request) {
        UserSubscription::where('user_subscription_id', $request->subscription_id)->update([
            'status' => 'expired',
            'expired_at' => now()
        ]);
        return redirect()->back()->with('success','Subscription cancel successfully');
    }
}

