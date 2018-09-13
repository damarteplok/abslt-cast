<template>

<div class="card">
	<div class="card-header">Edit Personal Data</div>
	<div class="card-body">


			<div class="form-group">
				<label for="name">Name</label>
				<input type="text" v-model="user.name" class="form-control">
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" v-model="user.username" class="form-control">
			</div>

			<div class="form-group">
				<label for="username">Email</label>
				<input type="email" v-model="user.email" class="form-control">
			</div>

			<div class="form-group">
				<div class="text-center">
					<button class="btn btn-success" type="submit" :disabled="!isValidLoginForm" @click.prevent="updatePersonal()">Save</button>
				</div>
			</div>

		
	</div>
</div>




</template>



<script>
	
	import Swal from 'sweetalert'
	import Axios from 'axios'

	export default {
		props: ['users', 'username'],
		data() {
			return {
				user: JSON.parse(this.users),
				loading: false
			}
		},
		computed: {

            isValidLoginForm () {

                return this.emailIsValid() && this.user.name && this.user.username && !this.loading

            }
        },
        methods: {
        	emailIsValid () 
            {
             if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.user.email))
              {
                return true

              } else {

                return false
              }
                
            },
            updatePersonal() {
				
				let a = '/profile/update/'
				let url = a.concat(this.username)
	
				Axios.put(url, {
					
					name: this.user.name,
					username: this.user.username,
					email: this.user.email

				}).then(resp=>{
					
					Swal({text: 'successfully updated', icon:'success'}).then(()=> {
						window.location = '/profile/' + this.user.username;
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


</script>