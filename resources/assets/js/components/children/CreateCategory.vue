<template>

	<div class="modal fade" id="modalCategory" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
              <h4 class="mb-5">Create New Category</h4>
              
              <div class="form-group">
                <input class="form-control" type="text" v-model="category.title" placeholder="Title">
              </div>            

              <button class="btn btn-lg btn-block btn-primary" type="button" @click="updateCategory()" v-if="editing">Save Category</button>

              <button class="btn btn-lg btn-block btn-primary" type="button" @click="createCategory()" v-else>Create Category</button>

              <hr>

              
          </div>

        </div>
      </div>
    </div>

</template>

<script>

	import Axios from 'axios'

	class Category {
		constructor(category){
			this.title = category.title || ''
		}
	}

	
	export default {
		mounted() {

			this.$parent.$on('create_new_category', () => {
				this.editing = false
				this.category = new Category({})
				$('#modalCategory').modal()
			})


			this.$parent.$on('edit_category', (category) => {
				this.editing = true
				this.category = new Category(category)
				this.categoryId = category.id
				$('#modalCategory').modal()
			})
		},

		data() {
			return {
				category: {},
				editing: false,
				categoryId: null
			}
		},

		methods: {
			createCategory() {
				
				let url = '/admin/category'
				Axios.post(url, this.category).then(resp => {
					this.$parent.$emit('category_created', resp.data)
					console.log(resp.data)
					$('#modalCategory').modal('hide')
				}).catch(error => {
					$('#modalCategory').modal('hide')
					window.handleErrors(error)
				})
			},

			updateCategory() {
				
				let a = '/admin/category/'
				
				let url = a.concat(this.categoryId)
				

				Axios.put(url, this.category).then(resp=>{
					$('#modalCategory').modal('hide')
					this.$parent.$emit('category_updated', resp.data)
				}).catch(error =>{
					$('#createLesson').modal('hide')
					window.handleErrors(error)
				})
				
			}
		}
	}


</script>