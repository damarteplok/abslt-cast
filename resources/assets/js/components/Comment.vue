<template>
	
<!--
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
| Comments
|‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
!-->
<div class="section bg-gray">
	<div class="container">

	  <div class="row">
	    <div class="col-lg-8 mx-auto">

	      <div class="media-list">

	        <div class="media" v-for="comment, key in comments">
	          <img class="avatar avatar-sm mr-4" src="/storage/series/avatar.png" alt="default avatar">

	          <div class="media-body">
	            <div class="small-1">
	              <strong>{{ comment.name }}</strong>
	              <time class="ml-4 opacity-70 small-3">{{ comment.email }}</time>
	            </div>
	            <p class="small-2 mb-0">{{ comment.message }}</p>
	          </div>
	        </div>



	      

	      </div>


	      <hr>


	      <form>

	        <div class="row">
	          <div class="form-group col-12 col-md-6">
	            <input class="form-control" type="text" placeholder="Name" v-model="name">
	          </div>

	          <div class="form-group col-12 col-md-6">
	            <input class="form-control" type="text" placeholder="Email" v-model="email">
	          </div>
	        </div>

	        <div class="form-group">
	          <textarea class="form-control" placeholder="Comment" rows="4" v-model="message"></textarea>
	        </div>

	        <button class="btn btn-primary btn-block" :disabled="!isValid" type="submit" @click.prevent="sendComment()">Submit your comment</button>
	      </form>

	    </div>
	  </div>

	</div>
</div>


</template>


<script>
	
import axios from 'axios'


export default {
	props: ['default_comments', 'post_id'],
	data() {
		return{
			comments: JSON.parse(this.default_comments),
			name:'',
			message:'',
			email:'',
			id: this.post_id,
			loading:false
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
        sendComment () {
        	this.loading = true
			axios.post('/comment', {

				name: this.name,
				email: this.email,
				message: this.message,
				post_id: this.id


			}).then(resp => {
				// location.reload()
				this.name =''
				this.email=''
				this.message=''
				this.loading = false
				this.comments.push(resp.data)
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
		isValid() {
			return this.message && this.name && this.emailIsValid() && !this.loading && this.email
		}
	}


}

</script>