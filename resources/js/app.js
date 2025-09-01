import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import ExampleFormSubmit from './components/ExampleFormSubmit.vue';

const app = createApp({});
app.component('example-component', ExampleComponent);
app.component('example-fromsubmit', ExampleFormSubmit);
app.mount('#app');
