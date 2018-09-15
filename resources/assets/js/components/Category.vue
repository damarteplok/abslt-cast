<template>
	
	<div class="container text-center">
		<h1 class="text-center">
			<button class="btn btn-primary" @click="CreateNewCategory()">
				Create New Category
			</button>
		</h1>
		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between" v-for="category, key in categories">
				<span>{{ category.title }}</span>
				<span>
					<button class="btn btn-primary btn-xs" @click="editCategory(category)">
						Edit
					</button>

					<button class="btn btn-danger btn-xs" @click="deleteCategory(category.id, key)">
						Delete
					</button>
				</span>
			</li>
		</ul>
		
		<create-category></create-category>
	</div>
	
</template>


<script>
	import Axios from 'axios'
	
	export default {

		props: ['default_categories'],

		mounted(){

			this.$on('category_created', (category)=> {
				

				this.categories.push(category)
			})

			this.$on('category_updated', (category)=> {

				let lessonIndex = this.categories.findIndex(l => {
					return category.id == l.id
				})

				this.categories.splice(lessonIndex, 1, category)
			})
		},

		components: {
			'create-category': require('./children/CreateCategory.vue')
		},

		data() {
			return {
				categories: JSON.parse(this.default_categories) 
			}
		},

		computed: {

			
		},

		methods: {

			CreateNewCategory() {
				this.$emit('create_new_category')
			},

			deleteCategory(id,key) {

				let a = '/admin/category/'
				let url = a.concat(id)
				

				if(confirm('Are you sure you wanna delete ?')) {
					Axios.delete(url).then(resp=> {

						this.categories.splice(key,1)
						
					}).catch(error => {

						window.handleErrors(error)
						
					})
				}
			},

			editCategory(category) {
				this.$emit('edit_category', category)
			}
		}

	}

</script>