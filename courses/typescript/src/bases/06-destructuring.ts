
interface Hero {
    name: string;
    age: number;
    code_name: string;
    power?: string;
};

export const person: Hero = {
    name: 'Tony',
    age: 45,
    code_name: 'Ironman',
};


// desestructuration
const { name, age, power = 'Doesn\'t have a power' } = person // this can be an object or an array

console.log({name, age, power}) ;


interface create_hero_args {
    name: string;
    age: number;
    code_name: string;
    power?: string;
};


const create_hero = ( { name, age, code_name, power }: create_hero_args ) => ({
    id: 123123,
    name: name,
    age: age,
    code_name: code_name,
    power: power ?? 'Doesn\'t have power',
});

const new_hero = create_hero({name: 'Peter', age: 18, code_name: 'Spiderman', power: 'Spider'});

console.log({ new_hero });

export {};


