<template>
  <div>

    <!-- Sidenav -->
  <sidebar />

  <!-- Main content -->
  <div class="main-content">
  <no-ssr>
    <notifications position="top right" group="error" classes="vue-notification error"/>
  </no-ssr>
    <!-- Top navbar -->
    <topbar />
    <!-- Header -->
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
       <!-- Head Icons -->
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
      <nuxt />
      
      <!-- Footer -->
      <foot />
    </div>
  </div>

  </div>
</template>

<script>
  import Foot from './admin/Foot.vue'
  import Topbar from './admin/Topbar.vue'
  import Sidebar from './admin/Sidebar.vue'
  export default {
    head: {
      script: [
        { src: '/assets/vendor/jquery/dist/jquery.min.js' },
        { src: '/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' },
        { src: '/assets/vendor/chart.js/dist/Chart.min.js' },
        { src: '/assets/vendor/chart.js/dist/Chart.extension.js' },
        { src: '/assets/js/argon.js', body: true }
      ],
      link: [
        { rel: 'stylesheet', href: '/assets/vendor/nucleo/css/nucleo.css' },
        { rel: 'stylesheet', href: 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css' },
        { rel: 'stylesheet', href: '/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css' },
        { rel: 'stylesheet', href: '/assets/css/argon.css' },
        { rel: 'stylesheet', href: 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' }
      ]
    },
    components: {
      Foot,Topbar,Sidebar
    }
  }
</script>