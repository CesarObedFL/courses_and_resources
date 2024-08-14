import { giphy_api } from "./12-axios";


export const get_image = async() => {
    try {
        const response = await giphy_api.get('/random');
        return response.data.data.images.downsized_large.url;
        
    } catch( error ) {
        throw 'URL don\'t found';
    }
};


get_image().then( url => console.log( url ) ).catch( error => console.warn(error) );