<template>

<div class="modal fade" id="LoginModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <form>

            <div v-if="errors.length > 0">
                <div class="mb-2 alert alert-danger" role="alert" v-for="error in errors" :key="errors.indexOf(error)">

                    {{ error }}
                    
                </div>    
            </div>
            
            
          <h4 class="fw-200 text-center">Login</h4>
          <p class="text-center">Sign into your account using your credentials.</p>
          <hr class="w-10">
          <div class="form-group">
            <input class="form-control" type="text" name="username" placeholder="Email" v-model="email">
          </div>

          <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" v-model="password">
          </div>

          <div class="row align-items-center pt-3 pb-5">
            <div class="col-auto">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" v-model="remember">
                <label class="custom-control-label">Remember me</label>
              </div>
            </div>

            <div class="col text-right">
              <p class="mb-0 fw-300"><a class="text-muted small-2" href="#">Forgot password?</a></p>
            </div>
          </div>

          <button class="btn btn-lg btn-block btn-primary" :disabled="!isValidLoginForm" type="submit" @click.prevent="attemptLogin()">Login</button>

          <div class="divider">Or sign in with</div>
          <div class="text-center">
            <a class="btn btn-primary btn-block" href="#">github</a>
            
          </div>

          <p class="small-2 text-center mt-5 mb-0">Don't have an account? <a href="/register">Create one</a></p>

        </form>
      </div>

    </div>
  </div>
</div>

</template>

<script>

    import axios from 'axios';


    export default {
        data() {
            return {
                email:'',
                password:'',
                remember: true,
                loading:false,
                errors: []
            }
        },

        methods: {

            emailIsValid () 
            {
             if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(this.email))
              {
                return true

              } else {

                return false
              }
                
            },

            attemptLogin ()

            {
                this.errors = []
                this.loading = true

                axios.post('/login', {

                    email: this.email,
                    password: this.password,
                    remember: this.remember

                }).then(resp => {

                    location.reload()

                }).catch(error => {
                    this.loading = false
                    if(error.response.status == 422)
                    {
                        this.errors.push('we couldnt verify your account')
                    } else {
                        this.errors.push('something went wrong')
                    }
                })
            }


        },

        computed: {

            isValidLoginForm () {

                return this.emailIsValid() && this.password && !this.loading

            }
        }
    }
</script>

