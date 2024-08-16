    const { createApp, ref } = Vue;

    const app = createApp ({

        setup() {
            const welcome_message = ref('Hola mundo');
            const name = ref('desde vue');

            const change_name = () => {
                name.value = "soy césar obed figueroa luna";
            };

            return {
                welcome_message,
                name,
                change_name,
            }
        }

    });

    app.mount('#myApp');