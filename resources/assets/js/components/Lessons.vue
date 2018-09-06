<template>
	
	<div class="container text-center">
		<h1 class="text-center">
			<button class="btn btn-primary" @click="CreateNewLesson()">
				Create New Lesson
			</button>
		</h1>
		<ul class="list-group">
			<li class="list-group-item d-flex justify-content-between" v-for="lesson, key in lessons">
				<span>{{ lesson.title }}</span>
				<span>
					<button class="btn btn-primary btn-xs" @click="editLesson(lesson)">
						Edit
					</button>

					<button class="btn btn-danger btn-xs" @click="deleteLesson(lesson.id, key)">
						Delete
					</button>
				</span>
			</li>
		</ul>
		<create-lesson></create-lesson>
	</div>
	
</template>


<script>
	import Axios from 'axios'
	
	export default {

		props: ['default_lessons', 'series_id'],

		mounted(){

			this.$on('lesson_created', (lesson)=> {
				

				this.lessons.push(lesson)
			})

			this.$on('lesson_updated', (lesson)=> {


				let lessonIndex = this.lessons.findIndex(l => {
					return lesson.id == l.id
				})

				this.lessons.splice(lessonIndex, 1, lesson)
			})
		},

		components: {
			'create-lesson': require('./children/CreateLesson.vue')
		},

		data() {
			return {
				lessons: JSON.parse(this.default_lessons) 
			}
		},

		computed: {

			
		},

		methods: {

			CreateNewLesson() {
				this.$emit('create_new_lesson', this.series_id)
			},

			deleteLesson(id,key) {

				let a = '/admin/'
				let b = '/lessons/'
				let c = this.series_id
				let url = a.concat(c,b)
				url = url.concat(id)

				if(confirm('Are you sure you wanna delete ?')) {
					Axios.delete(url).then(resp=> {

						this.lessons.splice(key,1)
						
					}).catch(error => {

						window.handleErrors(error)
						
					})
				}
			},

			editLesson(lesson) {
				let seriesId = this.series_id
				this.$emit('edit_lesson', {lesson, seriesId})
			}
		}

	}

</script>