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
}
