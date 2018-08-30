<template>
	
	<div class="container text-center">
		<h1 class="text-center">
			<button class="btn btn-primary" @click="CreateNewTag()">
				Create New Tag
			</button>
		</h1>
		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between" v-for="tag, key in tags">
				<span>{{ tag.tag }}</span>
				<span>
					<button class="btn btn-primary btn-xs" @click="editTag(tag)">
						Edit
					</button>

					<button class="btn btn-danger btn-xs" @click="deleteTag(tag.id, key)">
						Delete
					</button>
				</span>
			</li>
		</ul>
		
		<create-tag></create-tag>
	</div>
	
</template>


<script>
	import Axios from 'axios'
	
	export default {

		props: ['default_tags'],

		mounted(){

			this.$on('tag_created', (tag)=> {
				
				this.tags.push(tag)
			})

			this.$on('tag_updated', (tag)=> {

				window.noty({

					message: 'Tag updated successfully',
					type: 'success'
				})

				let lessonIndex = this.tags.findIndex(l => {
					return tag.id == l.id
				})

				this.tags.splice(lessonIndex, 1, tag)
			})
		},

		components: {
			'create-tag': require('./children/CreateTag.vue')
		},

		data() {
			return {
				tags: JSON.parse(this.default_tags) 
			}
		},

		computed: {

			
		},

		methods: {

			CreateNewTag() {
				this.$emit('create_new_tag')
			},

			deleteTag(id,key) {

				let a = '/admin/tag/'
				let url = a.concat(id)
				

				if(confirm('Are you sure you wanna delete ?')) {
					Axios.delete(url).then(resp=> {

						this.tags.splice(key,1)
						
					}).catch(error => {

						console.log(error)
						
					})
				}
			},

			editTag(tag) {
				this.$emit('edit_tag', tag)
			}
		}

	}

</script>