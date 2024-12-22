//app.js
import { createApp } from 'vue';
import ForumLayout from './components/layout/ForumLayout.vue';
import { registerAuthComponents } from './group/AuthGroup';
//utils 
import Input from './components/utils/forms/Input.vue';
import Button from './components/utils/forms/Button.vue';
import Card from './components/utils/card/Card.vue';
const app = createApp({});
registerAuthComponents(app);
app.component('forum-layout', ForumLayout);
app.component('Input', Input);
app.component('Button', Button);
app.component('Card', Card);
app.mount('#app');
