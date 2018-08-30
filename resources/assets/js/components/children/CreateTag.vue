<template>

	<div class="modal fade" id="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
              <h4 class="mb-5">Create New Tag</h4>
              
              <div class="form-group">
                <input class="form-control" type="text" v-model="tag.tag" placeholder="Title">
              </div>            

              <button class="btn btn-lg btn-block btn-primary" type="button" @click="updateTag()" v-if="editing">Save Tag</button>

              <button class="btn btn-lg btn-block btn-primary" type="button" @click="createTag()" v-else>Create Tag</button>

              <hr>

              
          </div>

        </div>
      </div>
    </div>

</template>

<script>

	import Axios from 'axios'

	class Tag {
		constructor(tag){
			this.title = tag.tag || ''
		}
	}

	
	export default {
		mounted() {

			this.$parent.$on('create_new_tag', () => {
				this.editing = false
				this.tag = new Tag({})
				$('#modal').modal()
			})


			this.$parent.$on('edit_tag', (tag) => {
				this.editing = true
				this.tag = {
					tag : tag.tag
				}
				this.tagId = tag.id
				$('#modal').modal()
			})
		},

		data() {
			return {
				tag: {},
				editing: false,
				tagId: null
			}
		},

		methods: {
			createTag() {
				
				let url = '/admin/tag'
				Axios.post(url, this.tag).then(resp => {
					this.$parent.$emit('tag_created', resp.data)
					console.log(resp.data)
					$('#modal').modal('hide')
				}).catch(error => {
					$('#modal').modal('hide')
					window.handleErrors(error)
				})
			},

			updateTag() {
				
				let a = '/admin/tag/'
				
				let url = a.concat(this.tagId)
				

				Axios.put(url, this.tag).then(resp=>{
					$('#modal').modal('hide')
					this.$parent.$emit('tag_updated', resp.data)
				}).catch(error =>{
					$('#createLesson').modal('hide')
					window.handleErrors(error)
				})
				
			}
		}
	}


</script>