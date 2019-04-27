<template>
	<div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
           
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Sign In</small>
              </div>

              <form>
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative" :class="{ ' has-danger': errors.email }">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input type="email" placeholder="Email" class="form-control"  v-model="form.email"/>
                    
                  </div>
                  <span v-if="errors.email" class="text-danger">{{ errors.email[0]}}</span>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative" :class="{ ' has-danger': errors.password }">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" type="password" v-model="form.password">
                  </div>
                  <span v-if="errors.password" class="text-danger">{{ errors.password[0]}}</span>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="button" class="btn btn-primary my-4" @click.prevent="Login">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="#" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
	export default {
		layout: 'login',
    middleware: 'guest',
    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            errors: []
        }
    },
    methods: {
        async Login() {
          await this.$auth.loginWith('local', {
              data: {
                email: this.form.email,
                password: this.form.password
              }
            })
            .then((res) => {
                this.$router.push(this.$route.query.redirect ? this.$route.query.redirect : '/')
            })
            .catch((res) => {
                this.errors = res.response.data.errors
            })
        }
    }
	}
</script>