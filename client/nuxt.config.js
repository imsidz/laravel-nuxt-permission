import pkg from './package'

export default {
  mode: 'universal',

  /*
  ** Headers of the page
  */
  head: {
    title: pkg.name,
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' }
    ],
    link: [
      { rel: 'icon', type: 'image/x-icon', href: '/favicon.ico' }
    ]
  },

  /*
  ** Customize the progress-bar color
  */
  loading: { color: '#fff' },

  /*
  ** Global CSS
  */
  css: [
  ],

  /*
  ** Plugins to load before mounting the App
  */
  plugins: [
    { src: '~/plugins/select', ssr: true },
    { src: '~/plugins/notification', ssr: false }
  ],

  /*
  ** Nuxt.js modules
  */
  modules: [
    '@nuxtjs/auth',
    // Doc: https://axios.nuxtjs.org/usage
    '@nuxtjs/axios'
    
  ],
  /*
  ** Axios module configuration
  */
  axios: {
    baseURL: 'http://permission.test/api/',
  },
  auth: {
    strategies: {
      local: {
        endpoints: {
          login: { url: '/auth/login', method: 'post', propertyName: 'meta.token' },
          logout: { url: '/auth/logout', method: 'post' },
          user: { url: '/auth/me', method: 'get', propertyName: 'data' }
        },
        // tokenRequired: true,
        // tokenType: 'bearer',
      }
    },

    redirect: {
      login: '/login',
      logout: '/login',
    },
    plugins: [
      '~/plugins/auth'
    ]
  },

  /*
  ** Build configuration
  */
  build: {
    /*
    ** You can extend webpack config here
    */
    extend(config, ctx) {
    }
  }
}
