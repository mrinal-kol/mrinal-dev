import './bootstrap';
import { createApp } from 'vue';
import ExampleComponent from './components/ExampleComponent.vue';
import ExampleFormSubmit from './components/ExampleFormSubmit.vue';
import StudentCrud from './components/StudentCrud.vue'
import AddStudent  from './components/AddStudent.vue';


const app = createApp({});
app.component('example-component', ExampleComponent);
app.component('example-fromsubmit', ExampleFormSubmit);
app.component('student-crud', StudentCrud);
app.component('add-student', AddStudent);
app.mount('#app');
