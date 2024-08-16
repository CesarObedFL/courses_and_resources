    const { createApp, ref } = Vue;

    const app = createApp ({
        template: `
            <h1>{{ welcome_message }}</h1>
            <p>{{ name }}</p>
        `,

        setup() {
            const welcome_message = ref('Hola mundo');
            const name = ref('desde vue');

            setTimeout( () => {
                name.value = "soy césar obed figueroa luna";
            }, 1000);

            return {
                welcome_message,
                name,
            }
        }

    });

    app.mount('#myApp');