import Vue from 'vue';

new Vue({
   el: '#app',

   data() {
       return {
           isNavToggled: false
       }
   },

   methods: {
       toggleNav() {
           this.isNavToggled = !this.isNavToggled;
       }
   }
});
