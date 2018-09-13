<template>

<div class="card">
	<div class="card-header">Your Current Card: {{ this.cardbrand }} {{ this.cardlast }}</div>
	<div class="card-body">

		<div class="form-group">
			<div class="text-center">
				<button class="btn btn-block btn-success" type="submit" @click.prevent="updateCard()">Change Card</button>
			</div>
		</div>

	</div>
</div>




</template>



<script>

import Swal from 'sweetalert'

import Axios from 'axios'

export default {

	props: ['emails', 'cardbrand', 'cardlast'],

	mounted() {

		this.handler = StripeCheckout.configure({

			key: 'pk_test_hCvqvnLwANTRi3QqVBJsjzyZ',
			image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
			locale: 'auto',
			allowRememberMe: false,
			token(token) {

				Swal({text: 'please wait while we update your card detail ...', buttons:false, closeOnClickOutside: false});

				Axios.post('/card/update', {
					
					stripeToken: token.id
					
				}).then(resp => {

					Swal({text: 'successfully updated', icon:'success'}).then(()=> {
						window.location = '';
					});
				})
			}

			
		})

		
	},

	data() {
		return {

			handler: null,
			data: this.emails
				
		}
	},

	methods: {
		updateCard() {
			

			this.handler.open({

				name: 'Absltcast',
				description: 'Absltcast subscriptions',
				email: this.data,
				panelLabel: 'update card detail'
				

			})
		}
	}

}


</script>