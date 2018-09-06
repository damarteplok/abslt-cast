<template>
	
	<div class="d-flex justify-content-center">
		<div :data-vimeo-id="lesson.video_id" data-vimeo-maxwidth="900" id="handstick" v-if="lesson">
			
		</div>
	</div>




</template>


<script>
import Axios from 'axios'

import Swal from 'sweetalert'

import Player from '@vimeo/player'
	
export default {
	
	props:['default_lesson', 'next_lesson_url'],

	data() {
		return {
			lesson: JSON.parse(this.default_lesson)
		}
	},

	methods: {
		displayVideoEndedAlert() {
			if(this.next_lesson_url) {
				Swal('Yayy ! You completed this Lesson !')
				.then(()=> {
					window.location = this.next_lesson_url
				})
			} else {
				Swal('Yayy ! You completed this Series !')
			}
			
		},
		completeLesson() {
			Axios.post(`/series/complete-lesson/${this.lesson.id}`, {})
			.then(resp => {
				this.displayVideoEndedAlert()
			})
		}
	},

	mounted(){

		const player = new Player('handstick')


		player.on('play', () => {
			console.log('our video playing')
		})

		player.on('ended', () => {
			this.completeLesson()
		})
	}
}


</script>