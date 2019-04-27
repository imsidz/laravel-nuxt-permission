<template>
	<div class="main-content">
	    <!-- Navbar -->
	    
	    <!-- Header -->
	    <div class="header bg-gradient-primary py-7 py-lg-8">
	     
	      <div class="separator separator-bottom separator-skew zindex-100">
	        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
	          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
	        </svg>
	      </div>
	    </div>
	    <!-- Page content -->
	    <nuxt />
	    
	  </div>
</template>

<script>
	export default {
		head: {
		    script: [
		      { src: '/assets/vendor/jquery/dist/jquery.min.js' },
		      { src: '/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js' },
		      { src: '/assets/js/argon.js?v=1.0.0' }
		    ],
		    link: [
		      { rel: 'stylesheet', href: '/assets/vendor/nucleo/css/nucleo.css' },
		      { rel: 'stylesheet', href: '/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css' },
		      { rel: 'stylesheet', href: '/assets/css/argon.css?v=1.0.0' }
		    ]
		}
	}
</script>