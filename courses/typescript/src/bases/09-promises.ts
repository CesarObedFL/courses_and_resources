

console.log('init');


new Promise( ( resolve, reject ) => {

    // when the promise is completed, .then function is executed
    resolve('promise completed');

    // when the promise is not completed .catch function is executed
    reject('promise incompleted');

}).then( (message ) => {
    console.log(message) 

}).catch( (error_message) => {
    console.log(error_message);

}).finally( () => {
    console.log('promise ending');
});


console.log('end');