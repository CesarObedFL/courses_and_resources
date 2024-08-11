
const number_array = [1,2,3,4,5];

number_array.push(6);

// spreading array values into array_2 and initializing array_2 with numbers and strings
const number_array_2: (number|string)[] = [...number_array]; 

number_array_2.push('7');


console.log({number_array, number_array_2});


export {};