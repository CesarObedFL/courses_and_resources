require('colors');

const showMenu = () => {

    return new Promise( resolve => {

        console.clear();
        console.log('====================='.green);
        console.log('Seleccione una Opción'.yellow);
        console.log('=====================\n'.green);

        console.log(`${ '1.-'.red } Crear una tarea`);
        console.log(`${ '2.-'.red } Listar tareas`);
        console.log(`${ '3.-'.red } Listar tareas completadas`);
        console.log(`${ '4.-'.red } Listar tareas pendientes`);
        console.log(`${ '5.-'.red } Completar tarea(s)`);
        console.log(`${ '6.-'.red } Borrar Tarea`);
        console.log(`\n${ '0.-'.red } Salir\n`);

        const readline = require('readline').createInterface({
            input: process.stdin, output: process.stdout
        });

        readline.question('Seleccione una opción: ', (opt) => {
            readline.close();
            resolve( opt );
        });

    } );

}

const pause = () => {

    return new Promise( resolve => { 
        const readline = require('readline').createInterface({
            input: process.stdin, output: process.stdout
        });
    
        readline.question(`\nPrecione ${ 'ENTER'.green } para continuar...\n`, (opt) => {
            readline.close();
            resolve();
        });
    });
}


module.exports = {
    showMenu,
    pause
}