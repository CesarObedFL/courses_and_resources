
export const person = {
    last_name: 'Tony',
    age: 45,
    address: {
        city: 'NY',
        zip: '51234',
        lat: 14.5234,
        lon: 14.1233,
    },
}; // as const; // if you don't want to change it's object properties, use ' as const;'

person.age = 44;

// to clone an object whos has nested objects use javascript function structuredClone
const person2 = structuredClone(person);

person2.last_name = 'Parker';
person2.address.city = 'LA';

console.log({person});
console.log({person2});