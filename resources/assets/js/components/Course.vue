<template>
	
<div>

<!-- header -->
<header class="header bg-fixed text-center text-white" style="background-image: url(../assets/img/bg/6.jpg)" data-overlay="5">
  <div class="container">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <h1>All Screencast</h1>
        
        
		<form @submit.prevent="submitFilter()" class="input-group mt-7">
		<select v-model="tag" @change="changeFilter()">
			<option value="latest">Latest</option>
			<option value="popular">Popular</option>
			<option value="top">Top</option>
		</select>
	      <input type="text" class="form-control" v-model="input" placeholder="Search">
	      <div class="input-group-addon">
	        <span class="input-group-text"><i class="ti-search"></i></span>
	      </div>
	    </form>
        <hr class="w-10 my-7">
        
      </div>
    </div>

  </div>
</header><!-- /.header -->


<section class="section bg-gray p-0">

<div class="container">


  
  <div class="row">
    <div class="col-md-10 col-xl-9 mx-auto">

      <div v-for="item in list" class="card hover-shadow-7 my-8">
        <div class="row">
          <div class="col-md-4">
            <a :href="'/series/'+ item.slug"><img class="fit-cover position-absolute h-100" :src="'/storage/' + item.image_url" alt="..."></a>
          </div>

          <div class="col-md-8">
            <div class="p-7">
              <h4>{{ item.title }}</h4>
              <p>{{  item.description.substr(0,100) }}</p>
              <a class="small ls-1" :href="'/series/'+ item.slug">Read More <span class="pl-1">⟶</span></a>
            </div>
          </div>
        </div>
      </div>
      <infinite-loading @distance="1" @infinite="infiniteHandler" ref="infiniteLoading">
	      	<span slot="no-more">
		      There is no more
		    </span>
      </infinite-loading>

    </div>
  </div>
</div>
</section>


</div>
</template>


<script>

import InfiniteLoading from 'vue-infinite-loading'
import Axios from 'axios'
	
export default {
	components: {
		InfiniteLoading,
	},
	data(){
		return {
			list: [],
			page: 1,
			tag: 'latest',
			input: '',
			search: 'Search'
	
		}
	},
	methods: {
		submitFilter() {
			this.page = 1
			this.search = this.input
			this.list = [];
			this.$nextTick(() => {
				this.$refs.infiniteLoading.$emit('$InfiniteLoading:reset');
			});	
		},
		changeFilter() {
		  this.page = 1
		  this.input = ''
		  this.search = 'Search'
	      this.list = [];
	      this.$nextTick(() => {
	        this.$refs.infiniteLoading.$emit('$InfiniteLoading:reset');
	      });
	    },
		infiniteHandler($state) {
			let vm = this;
			let a = '/course/'
			let b = this.tag + '/'
			let c = this.search
			let d = '/?page=' + this.page
			let url = a.concat(b, c, d)
			// let url = '/course/' + this.tag '/?page=' + this.page
			Axios.get(url).then(resp => {
	
				if(resp.data.data.length == 0){
					$state.complete();
						
				} else {
					let a = resp.data.data
					a.forEach(function(value){
						vm.list.push(value)
						$state.loaded();
					})
					
				}
				
			}).catch(error => {
				console.log(error)
			})
			this.page = this.page + 1;


			// this.$http.get('/course?page='+this.page, {headers: {
			// 		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			// 		    }})
			// 	.then(response => {
			// 		return response.json();
			// 	}).then(data => {
			// 		$.each(data.data, function(key, value) {
			// 			vm.list.push(value);
			// 		});
			// 		$state.loaded();
			// 	});
			// 	this.page = this.page + 1;
		}
	}

}



</script>