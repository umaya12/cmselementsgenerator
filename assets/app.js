/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

require('bootstrap');


///////////////////////////////////

// app.js
import { createApp } from 'vue';

const app = createApp({
    data() {
        return {
            counter: 0,
            syr:0,
            eur:0,
        };
    },
    created(){

    },
    watch:{
        eur:function(v){
            console.log(v)
            // this.eur=v*3000
        },
    },
    computed:{


    },
    methods:{
        alertMe(){
            alert(35235)
        }
    }
});

app.mount('#vue-app');
