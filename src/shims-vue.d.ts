declare module '*.vue' {
  import { DefineComponent } from 'vue'
  const component: DefineComponent<object, object, Record<string, unknown>>
  export default component
}
