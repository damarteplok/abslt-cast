<template>

	<div class="modal fade" id="createLesson" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

          <div class="modal-body">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
              <h4 class="mb-5">Create New Lesson</h4>
              
              <div class="form-group">
                <input class="form-control" type="text" v-model="lesson.title" placeholder="Title">
              </div>

              <div class="form-group">
                <input class="form-control" type="text" v-model="lesson.episode_number" placeholder="Vimeo video">
              </div>

              <div class="form-group">
                <input class="form-control" type="number" v-model="lesson.video_id" placeholder="Episode Number">
              </div>

              <div class="form-group">
              	<textarea cols="30" rows="10" class="form-control" v-model="lesson.description"></textarea>
              </div>

              

              <button class="btn btn-lg btn-block btn-primary" type="button" @click="updateLesson()" v-if="editing">Save Lesson</button>

              <button class="btn btn-lg btn-block btn-primary" type="button" @click="createLesson()" v-else>Create Lesson</button>

              <hr>

              
          </div>

        </div>
      </div>
    </div>

</template>

<script>

	import Axios from 'axios'

	class Lesson {
		constructor(lesson){
			this.title = lesson.title || ''
			this.description = lesson.description || ''
			this.video_id = lesson.video_id || ''
			this.episode_number = lesson.episode_number || ''
		}
	}

	
	export default {
		mounted() {

			this.$parent.$on('create_new_lesson', (seriesId) => {
				this.seriesId = seriesId
				this.editing = false
				this.lesson = new Lesson({})
				$('#createLesson').modal()
			})


			this.$parent.$on('edit_lesson', ({lesson, seriesId}) => {
				this.editing = true
				this.lesson = new Lesson(lesson)
				this.seriesId = seriesId
				this.lessonId = lesson.id
				$('#createLesson').modal()
			})
		},

		data() {
			return {
				lesson: {},
				seriesId:'',
				editing: false,
				lessonId: null
			}
		},

		methods: {
			createLesson() {
				let series_by_id = this.seriesId

				let a = '/admin/'
				let b = '/lessons'
				let url = a.concat(series_by_id,b)
				Axios.post(url, this.lesson).then(resp => {
					this.$parent.$emit('lesson_created', resp.data)
					$('#createLesson').modal('hide')
				}).catch(error => {
					$('#createLesson').modal('hide')
					window.handleErrors(error)
				})
			},

			updateLesson() {
				let series_by_id = this.seriesId
				let a = '/admin/'
				let b = '/lessons/'
				let url = a.concat(series_by_id,b)
				url = url.concat(this.lessonId)

				Axios.put(url, this.lesson).then(resp=>{
					$('#createLesson').modal('hide')
					this.$parent.$emit('lesson_updated', resp.data)
				}).catch(error =>{
					$('#createLesson').modal('hide')
					window.handleErrors(error)
				})
				
			}
		}
	}


</script>