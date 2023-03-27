import { boot } from 'quasar/wrappers'
import VuePlugin from 'quasar-ui-telemedicine'

export default boot(({ app }) => {
  app.use(VuePlugin)
})
