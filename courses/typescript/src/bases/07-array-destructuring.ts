const sayayins = ['Goku', 'Vegeta', 'Gohan', 'Goten'];

const [, v] = sayayins;

console.log({ v });


// when the return values are a tuple of different types you can treat them as 
// a const to use them with their respectives type functions
const return_array = () => {
    return [ 123, 'ABC' ] as const;
}

const [ numbers , letters ] = return_array();

console.log(numbers * 2, letters.toLowerCase() );


export {};


