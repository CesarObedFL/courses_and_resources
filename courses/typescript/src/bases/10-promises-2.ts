import type { Hero } from "../data/heroes";
import { get_hero_by_id } from "./08-imports-exports";


const get_hero_by_id_async = ( id: number ):Promise<Hero> => {
    return new Promise( ( resolve, reject ) => {
        setTimeout( () => {
            const hero = get_hero_by_id( id );
            hero ? resolve( hero ) : reject(`Hero not found ${id}`);
        }, 1500);        
    });
};

get_hero_by_id_async(2)
    .then( hero => console.log(`Hero: ${hero.name}`) )
    .catch( message => alert(message) );

get_hero_by_id_async(20)
    .then( hero => console.log(`Hero: ${hero.name}`) )
    .catch( message => console.warn(message) );