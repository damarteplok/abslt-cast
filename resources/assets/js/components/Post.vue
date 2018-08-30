<template>
	
	<div class="container text-center">
		<h1 class="text-center">
			<button class="btn btn-primary" @click="asa()">
				Create New Posts
			</button>
		</h1>

		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between" v-for="post, key in posts">
				<span>
					<!-- <img class="mr-1" v-bind:src="'storage/' + post.image_url"   alt="img" width="90px" height="auto"> -->
					{{ post.title }}
				</span>
				
				<span>
					<button class="btn btn-primary btn-xs" @click="editPost(post)">
						Edit
					</button>

					<button class="btn btn-danger btn-xs" @click="deletePost(post.id, key)">
						Delete
					</button>
				</span>
			</li>
		</ul>

		<create-post></create-post>
	</div>
	
</template>


<script>
	import Axios from 'axios'
	
	export default {

		props: ['default_categories', 'default_posts', 'default_tags'],

		methods: {

			asa() {
				this.$emit('asu', this.categories, this.tags )
			},

			deletePost(id,key) {

				let a = '/admin/post/'
				let url = a.concat(id)
				

				if(confirm('Are you sure you wanna delete ?')) {
					Axios.delete(url).then(resp=> {

						this.posts.splice(key,1)
						
					}).catch(error => {

						console.log(error)
						
					})
				}
			},

			editPost(post) {
				this.$emit('edit_post', post, this.categories, this.tags)
			}

		},

		data() {
			return {
				posts: JSON.parse(this.default_posts),
				tags: JSON.parse(this.default_tags),
				categories: JSON.parse(this.default_categories)
			}
		},

		components: {
			'create-post': require('./children/CreatePost.vue')
		},

		

		mounted(){

			this.$on('post_created', (post)=> {
	
				this.posts.push(post)
			})

			this.$on('post_updated', (post)=> {


				let lessonIndex = this.posts.findIndex(l => {
					return post.id == l.id
				})

				this.posts.splice(lessonIndex, 1, post)
			})
		},

		


		computed: {

			
		}

		

	}

</script>