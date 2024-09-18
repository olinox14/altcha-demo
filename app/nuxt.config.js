export default {
  app: {
    head: {
      title: 'Altcha Demo',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { hid: 'description', name: 'description', content: '' }
      ]
    }
  },
  runtimeConfig: {
    challengeUrl: 'http://altchademo_api/api/challenge',
    public: {
      challengeUrl: 'https://local.api.altcha-demo.net/api/challenge'
    }
  },
  typescript: {
    strict: true
  },
  vite: {
    define: {
      'process.env.DEBUG': process.env.DEBUG
    },
    server: {
      port: 443,
      hmr: {
        protocol: 'wss'
      }
    }
  },
  compatibilityDate: '2024-09-18'
}
