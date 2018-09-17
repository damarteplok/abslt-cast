<template>
	
<section class="section">
    <div class="container">

      <div class="row">
        <form class="col-lg-6 mx-auto p-6 bg-gray rounded" action=".#" method="POST" data-form="mailer">
          <div class="alert alert-success d-on-success">We received your message and will contact you back soon.</div>

          <div v-if="success.length > 0" class="alert alert-success alert-dismissible fade show mb-2" role="alert">
		  	<strong> Success!</strong> your inquiry delivered.
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
		  </div>

		  <div v-if="errors.length > 0" class="alert alert-danger alert-dismissible fade show mb-2" role="alert">
		  	<strong>Error!</strong> something went wrong.
		  	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		    	<span aria-hidden="true">&times;</span>
		  	</button>
		  </div>

          <div class="form-row">
			
			<!-- <div v-if="errors.length > 0">
                <div class="mb-2 alert alert-danger" role="alert" v-for="error in errors" :key="errors.indexOf(error)">

                    {{ error }}
                    
                </div>    
            </div> -->

            <div class="form-group col-md-6">
              <input class="form-control form-control-lg" type="text" v-model="name" placeholder="Your Name">
            </div>

            <div class="form-group col-md-6">
              <input class="form-control form-control-lg" v-model="email" placeholder="Your Email Address">
            </div>
          </div>


          <div class="form-group">
            <textarea class="form-control form-control-lg" rows="4" placeholder="Your Message" v-model="message"></textarea>
          </div>

          <div class="text-center">
            <button class="btn btn-lg btn-primary" :disabled="!isValid" type="submit" @click.prevent="sendMessage()">Submit Inquiry</button>
          </div>
        </form>
      </div>

    </div>
  </section>

</template>

<script>
	
import axios from 'axios'

export default {


	data() {
		return {
			name:'',
			email: '',
			message: '',
		    loading:false,
            errors: [],
            success: []
		}
	},
	methods: {
		emailIsValid () {

         if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
          {
            return true

          } else {

            return false
          }
            
        },
		sendMessage() {
			this.success=[]
			this.errors=[]
			this.loading = true
			axios.post('/message', {

				name: this.name,
				email: this.email,
				message: this.message

			}).then(resp => {
				// location.reload()
				this.success.push('success')
				this.name =''
				this.email=''
				this.message=''
				this.loading = false
			}).catch(error=>{
				this.loading = false
                if(error.response.status == 422)
                {
                    this.errors.push('error')

                } else {
                    this.errors.push('something went wrong')
                }
			})
		}
	},
	computed: {
		isValid () {
			return this.emailIsValid() && this.email && this.name && this.message && !this.loading
		}
	}


}


</script>