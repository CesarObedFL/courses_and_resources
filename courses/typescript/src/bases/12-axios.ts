import axios from 'axios';


const api_key = import.meta.env.VITE_GIPHY_API_KEY;

// create an instance of axios to work with giphy api
export const giphy_api = axios.create({
    baseURL: 'https://api.giphy.com/v1/gifs',
    params: {
        api_key: api_key,
    }
});


giphy_api.get('/random')
        .then( response => console.log({ response }) )
        .catch( error => console.warn(error) );  