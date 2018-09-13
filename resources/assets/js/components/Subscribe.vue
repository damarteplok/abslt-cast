<template>

<div class="card">
	<div class="card-header" v-if="this.currentplan == 'plan_DaeJ4Ws8aYwghv' ">Your Current Plan: Monthly</div>
	<div class="card-header" v-else-if="this.currentplan == 'plan_DaeMKW8TVKvNZD' ">Your Current Plan: Yearly</div>
	<div class="card-header" v-else>Your Current Plan: No Plan</div>


	<div class="card-body" v-if="this.currentplan == 'no' ">
		
		<p>please visit in <a href="/subscribe"> subscribe link</a> </p>
		
			

		
	</div>
	
	<div class="card-body" v-else>
		<div class="form-group">
	      	<select v-model="plan" id="category" class="form-control">
	      		<option>
	      			monthly
	      		</option>
	      		<option>
	      			yearly
	      		</option>
	      	</select>
	    </div>

		<div class="form-group">
			<div class="text-center">
				<button class="btn btn-block btn-success" type="submit" @click.prevent="updatePlan(plan)">Change Plan</button>
			</div>
		</div>
	</div>


</div>




</template>



<script>
	
	import Swal from 'sweetalert'
	import Axios from 'axios'

	export default {
		props: ['data'],
		data() {
			return {
				plan: '',
				currentplan: this.data
			}
		},
		computed: {

           
        },
        methods: {
        	
            updatePlan(plan) {
				
				let url = '/subscription/change/'
				
				if(plan == 'monthly')
				{
					Swal({text: 'please wait while we subscribe you to a plan ...', buttons:false, closeOnClickOutside: false});

					Axios.post(url, {
						name: 'monthly',
						plan: 'plan_DaeJ4Ws8aYwghv'
						

					}).then(resp=>{
						

						Swal({text: 'successfully updated', icon:'success'}).then(()=> {
							window.location = '';
						});

					}).catch(error =>{
						console.log(error)
						Swal({text: 'failed updated', icon:'error'}).then(()=> {
							window.location = '';
						});
					})
					
				} else if (plan == 'yearly') {

					Swal({text: 'please wait while we subscribe you to a plan ...', buttons:false, closeOnClickOutside: false});

					Axios.post(url, {
						name: 'yearly',
						plan: 'plan_DaeMKW8TVKvNZD'
						

					}).then(resp=>{
						
						Swal({text: 'successfully updated', icon:'success'}).then(()=> {
							window.location = '';
						});

					}).catch(error =>{
						console.log(error)
						Swal({text: 'failed updated', icon:'error'}).then(()=> {
							window.location = '';
						});
					})	
				}
				
				
			}
        }
	}


</script>