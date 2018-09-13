<?php

namespace Absltcast\Http\Controllers;

use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    //
    public function showSubscriptionForm()
    {
    	return view('subscribe');
    }

    public function subscribe(Request $request)
    {
    	\Stripe\Stripe::setApiKey('sk_test_UsC6i1sxwf2ECe34AmrGJUAJ');

		return auth()->user()
			->newSubscription(
				request('plan'), request('idPlan')
			)->create(request('stripeToken'));
    }

    public function change(Request $request)
    {
        \Stripe\Stripe::setApiKey('sk_test_UsC6i1sxwf2ECe34AmrGJUAJ');

        $user = auth()->user();
        $userPlan = $user->subscriptions->first()->stripe_plan;
        $userPlan2 = $user->subscriptions->first()->name;

        if($request->plan === $userPlan) {
            
            return response()->json(['status' => 'ok'], 200);
        }

        $user->subscription($userPlan2)->swap($request->plan);
        $user->save();

        return response()->json(['status' => 'ok'], 200);
    }
}
