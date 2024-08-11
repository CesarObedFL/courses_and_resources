



const heroes = [
    {
        id: 1,
        name: 'Batman',
    },
    {
        id: 2,
        name: 'Superman',
        power: 'Strenght',
    },
];


const hero = heroes.find( (_hero) => _hero.id === 1 );
const hero_2 = heroes.find( (_hero) => _hero.id === 2 );
const hero_3 = heroes.find( (_hero) => _hero.id === 3 );



console.log( hero?.name );
console.log( hero_2?.name );
console.log( hero_3?.name );


export {};