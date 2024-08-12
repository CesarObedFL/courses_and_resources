import heroes, { type Owner } from "../data/heroes";

console.log( heroes );


export const get_hero_by_id = ( id: number ) => {
    return heroes.find( hero => hero.id === id ) ?? {};
}; 

console.log( get_hero_by_id(1) );

console.log( get_hero_by_id(100) );

export const get_hero_by_owner = ( owner: Owner ) => {
    return heroes.filter( hero => hero.owner === owner ) ?? {};
};

console.log( get_hero_by_owner('Marvel') );