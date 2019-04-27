<template>
  <section class="container">
    <div>
      <h1 class="title">
        iMsIdZz
      </h1>
      <div v-if="$auth.loggedIn">
        <div v-if="$auth.user.roles.includes('admin')">
          <nuxt-link :to="'/admin'"> Go to admin page </nuxt-link>
        </div>
      </div>
      <div v-if="!$auth.loggedIn">
        <nuxt-link to="/login">Login </nuxt-link>
      </div>
      <h2 class="subtitle">
        Laravel Nuxt Permission & Role base application
      </h2>
      
    </div>
  </section>
</template>

<script>

export default {
  
}

</script>

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand', 'Source Sans Pro', -apple-system, BlinkMacSystemFont,
    'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
</style>