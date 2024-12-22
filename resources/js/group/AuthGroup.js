// AuthGroup.js
import { createApp } from 'vue';
import AuthSwitch from '../components/vue/login/AuthSwitch.vue';

export function registerAuthComponents(app) {
    app.component('auth-switch', AuthSwitch);
}