export default {
  app: {
    head: {
      title: 'App',
      meta: [
        { charset: 'utf-8' },
        { name: 'viewport', content: 'width=device-width, initial-scale=1' },
        { hid: 'description', name: 'description', content: '' },
        { name: 'msapplication-TileColor', content: '#324250' },
        { name: 'msapplication-TileImage', content: '/favicon/mstile-144x144.png' }
      ],
    }
  },
  typescript: {
    strict: true
  },
  vite: {
    define: {
      'process.env.DEBUG': process.env.DEBUG,
    },
    //@ts-ignore
    server : {
      //@ts-ignore
      port: 443,
      hmr: {
        protocol: 'wss'
      }
    },
  }
}
