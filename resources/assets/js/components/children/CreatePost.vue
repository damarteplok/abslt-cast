<template>

	<div class="modal fade" id="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
              <h4 class="mb-5">Create New Post</h4>
 
              <div class="form-group">
                <input class="form-control" type="text" v-model="title" placeholder="Title">
              </div>

              <div class="form-group">
              	<div class="row">
              		<div class="col-3" v-if="image_url">
		              <img :src="image_url" class="img-responsive" height="70" width="90" alt="Image">
		           </div>
		           <div class="col-9 ml-auto">
		           	<input type="file" v-on:change="onImageChange" class="form-control">
		           </div>
              	</div>
                
              </div>

              <div class="form-group">
              	<select v-model="category_id" id="category" class="form-control">
              		<option v-for="category in categories" v-bind:value="category.id">
              			{{ category.title }}
              		</option>
              	</select>
              </div>

			  <div class="d-flex flex-wrap">              
	              <div class="checkbox" v-for="t in tags">
	              	<label><input type="checkbox" v-bind:value="t.id" v-model="tag">{{ t.tag }}</label>
	              </div>
          	  </div>
			  
                  
              <div class="form-group">
              	<textarea cols="30" rows="10" class="form-control" v-model="description"></textarea>
              </div>
              
              <button class="btn btn-lg btn-block btn-primary" type="button" @click="updatePost()" v-if="editing">Save Post</button>

              <button class="btn btn-lg btn-block btn-primary" type="button" @click="createPost()" v-else>Create Post</button>

              <hr>
              
          </div>

        </div>
      </div>
    </div>

</template>

<script>

	import Axios from 'axios'

	
	export default {
		mounted() {

			this.$parent.$on('asu', (categories, tags) => {
				this.categories = categories
				this.tags = tags
				this.editing = false
				
				this.title = ''
				this.description = ''
				this.tag = []
				this.category_id = ''
				this.image_url = ''
				$('#modal').modal()
			})


			this.$parent.$on('edit_post', (post, categories, tags) => {
				this.editing = true
				this.categories = categories
				this.tags = tags
				this.title = post.title
				this.description = post.description
				this.tag = []
				this.category_id = ''
				this.image_url = ''
				this.postId = post.id
				$('#modal').modal()
			})
		},

		data() {
			return {
		
				title: '',
				description: '',
				tag: [],
				category_id: '',
				image_url: '',
				categories:{},
				tags: {},
				editing: false,
				postId: null
				
			}
		},

		methods: {
			onImageChange (e) {
				let files = e.target.files || e.dataTransfer.files;
                if (!files.length)
                    return;
                this.createImage(files[0]);
			},
			createImage(file) {
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    vm.image_url = e.target.result;
                };
                reader.readAsDataURL(file);
            },
			createPost() {
				let url = '/admin/post'

				Axios.post(url, {

					title: this.title,
					description: this.description,
					tag: this.tag,
					category_id: this.category_id,
					image_url: this.image_url

				}).then(resp => {
					this.$parent.$emit('post_created', resp.data)
					
					$('#modal').modal('hide')
				}).catch(error => {
					console.log(error)
					
					$('#modal').modal('hide')
					//window.handleErrors(error)
				})
			},

			updatePost() {
				
				let a = '/admin/post/'
				let url = a.concat(this.postId)
				

				Axios.put(url, {
					
					title: this.title,
					description: this.description,
					tag: this.tag,
					category_id: this.category_id,
					image_url: this.image_url

				}).then(resp=>{
					$('#modal').modal('hide')
					this.$parent.$emit('post_updated', resp.data)
				}).catch(error =>{
					$('#modal').modal('hide')
					console.log(error)
				})
				
			}
		}
	}


</script>