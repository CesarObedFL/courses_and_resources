    const { createApp, ref } = Vue;

    const app = createApp ({
        template: `
            <h1>Hola mundo</h1>
            <p>Desde Vue</p>
        `
    });

    app.mount('#myApp');