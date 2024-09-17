import { defineComponent, onMounted, ref } from "vue";


export default defineComponent( {    
    setup: () => {

        console.log('setup');

        const counter = ref(0);

        onMounted(() => { 
            console.log('onMounted')
        });

        return {
            counter,
        };
    },
} );