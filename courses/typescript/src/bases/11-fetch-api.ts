
  
const api_key = import.meta.env.VITE_GIPHY_API_KEY;


fetch(`https://api.giphy.com/v1/gifs/random?api_key=${api_key}`)
    .then( response => response.json() )
    .then ( body => console.log({ body }) )
    .catch( error => console.warn(error) );