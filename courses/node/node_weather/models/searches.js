const axios = require('axios');

class Searches {
    historial = ['MexicoCity', 'Madrid', 'NewYork'];

    constructor() {

    }

    async city( place = '' ) {
        
        try {
            const res = await axios.get('https://reqres.in/api/users/2');
            console.log( res.data )
            return [];

        } catch(error) {
            return [];
        }
    }
}

module.exports = { Searches }