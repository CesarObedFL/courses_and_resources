

// normal function
function greet_person( name: string) {
    return `Hello ${name}`;
}

console.log( greet_person('César') );


// arrow function
const greet_person_2 = ( name: string) => {
    return `Hello ${name}`;
};

console.log( greet_person_2('Obed') );

// simply arrow function
const greet_person_3 = ( name: string) => `Hello ${name}`;

console.log( greet_person_3('César Obed') );


// arrow function returning an object
const get_user = () => {
    return {
        uid: 'ABC-123',
        name: 'Tony',
    };
};

console.log( get_user() );


// simply arrow function returning an object
const get_user_2 = () => ({ uid: 'DEF-456', name: 'Stark', });

console.log( get_user_2() )


// simply arrow function, passing parameter and infering value parameter
const get_user_3 = (uid: string) => ({ uid: uid, name: 'Peter', });

console.log( get_user_3('GHI-789') )
