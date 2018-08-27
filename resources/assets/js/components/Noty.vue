<template>
	<div class="alert alert-noty" 

		:class="type"
		v-if="notification">
		<p class="text-center">
			{{ notification.message }}
		</p>
	</div>
</template>

<script>
	export default{

		created() {
			
			window.events.$on('notification', (payload) =>{
				this.notification = payload
				
				setTimeout(() => {
					this.notification = null
				}, 2500)

			})
		},

		data() {
			
			return {

				notification: null
			}
		},

		computed: {
			type() {
				let a = this.notification.type
				return 'alert-'.concat(a)
			}
		}

	}
</script>


<style>

	alert-noty {
		position: fixed;
		z-index: 1;

	}

</style>