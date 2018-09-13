
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


window.noty = function(notification){
	window.events.$emit('notification', notification)
}

window.handleErrors = function(error) {

	if(error.response.status == 422){
		window.noty({
			message: 'You had validation errors. Please try again.',
			type: 'danger'
		})
	}

	window.noty({
		message: 'Something went wrong. Please refresh the page.',
		type: 'danger'
	})
}

Vue.use(require('vue-resource'));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('vue-noty', require('./components/Noty.vue'))

Vue.component('vue-login', require('./components/Login.vue'))

Vue.component('vue-lessons', require('./components/Lessons.vue'))

Vue.component('vue-player', require('./components/Player.vue'))

Vue.component('vue-category', require('./components/Category.vue'))

Vue.component('vue-posts', require('./components/Post.vue'))

Vue.component('vue-tag', require('./components/Tag.vue'))

Vue.component('vue-message', require('./components/Message.vue'))

Vue.component('vue-comment', require('./components/Comment.vue'))

Vue.component('vue-course', require('./components/Course.vue'))

Vue.component('InfiniteLoading', require('vue-infinite-loading'))

Vue.component('vue-stripe', require('./components/Stripe.vue'))

Vue.component('vue-personal', require('./components/Personal.vue'))

Vue.component('vue-subscribe', require('./components/Subscribe.vue'))

Vue.component('vue-card', require('./components/Card.vue'))


const app = new Vue({
    el: '#app'
});
