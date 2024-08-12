import heroes, { owners } from "../data/heroes";

console.log( heroes, owners );


export const get_hero_by_id = ( id: number ) => {
    return heroes.find( hero => hero.id === id ) ?? {};
}; 

console.log( get_hero_by_id(1) );

console.log( get_hero_by_id(100) );

export const get_hero_by_owner = ( owner: string ) => {
    return heroes.filter( hero => hero.owner === owner ) ?? {};
};

console.log( get_hero_by_owner('Marvel') );