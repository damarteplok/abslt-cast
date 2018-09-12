<template>

<div>

	<section class="section">
        <div class="container">
          <header class="section-header">
            <small>Pricing</small>
            <h2>Choose License Type</h2>
            <hr>
            <p class="lead">use 42424242424242 test number card, this is just for learning, no charge</p>
          </header>


          <div class="row gap-y">

            <div class="col-lg-4 offset-lg-2">
              <div class="pricing-3">
                <h6 class="plan-name text-primary">Monthly</h6>
                <h2 class="price">$10</h2>
                <ul>
                  <li>WKWKWKWK support</li>
                  <li>WKWKWKWK support</li>
                  <li>WKWKWKWK Support</li>
                </ul>
                <br>
                <a class="btn btn-outline-primary btn-round w-200" @click="subscribe('monthly')">Get started</a>
              </div>
            </div>


            <div class="col-lg-4">
              <div class="pricing-3">
                <h6 class="plan-name text-primary">Yearly</h6>
                <h2 class="price">$100</h2>
                <ul>
                  <li>7 Websites</li>
                  <li>Auto Import</li>
                  <li>10 Hour Support</li>
                </ul>
                <br>
                <a class="btn btn-outline-primary btn-round w-200"  @click="subscribe('yearly')">Get started</a>
              </div>
            </div>


            

          </div>

        </div>
      </section>

<!-- 	<div class="d-flex justify-content-center">

		<button class="btn btn-success mx-1" @click="subscribe('monthly')">Subscribe to $10.00 Monthly</button>

		<button class="btn btn-info mx-1" @click="subscribe('yearly')">Subscribe to $100.00 Yearly</button>
		
	</div> -->

</div>

</template>


<script>

import Swal from 'sweetalert'

import Axios from 'axios'

export default {

	props: ['emails'],

	mounted() {

		this.handler = StripeCheckout.configure({

			key: 'pk_test_hCvqvnLwANTRi3QqVBJsjzyZ',
			image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
			locale: 'auto',
			token(token) {
				Swal({text: 'please wait while we subscribe you to a plan ...', buttons:false});

				Axios.post('/subscribe', {
					stripeToken: token.id,
					plan: window.stripePlan,
					idPlan: window.stripeIdPlan
				}).then(resp => {

					Swal({text: 'successfully subscribed', icon:'success'}).then(()=> {
						window.location = '';
					});
				})
			}

			
		})

		
	},

	data() {
		return {
			plan:'',
			amount: 0,
			handler: null,
			
			
		}
	},

	methods: {
		subscribe(plan) {
			if(plan == 'monthly') {
				window.stripePlan = 'monthly'
				window.stripeIdPlan = 'plan_DaeJ4Ws8aYwghv'
				this.amount = 1000
				
			} else {
				window.stripePlan = 'yearly'
				window.stripeIdPlan = 'plan_DaeMKW8TVKvNZD'
				this.amount = 10000
				
				 
			}

			this.handler.open({

				name: 'Absltcast',
				description: 'Absltcast subscriptions',
				amount: this.amount,

				email: this.emails
				

			})
		}
	}

}


</script>