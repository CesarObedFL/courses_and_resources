const inquirer = require('inquirer');
require('colors');

const questions = [ 
    {
        type: 'list',
        name: 'opt',
        message: 'Qué desea hacer?',
        choices: [
            {
                value: '1',
                name: '1.- buscar ciudad'
            },
            {
                value: '2',
                name: '2.- historial'
            },
            {
                value: '0',
                name: '0.- salir'
            }
        ]
    }
];

const inquirer_menu = async() => {

    console.clear();
    console.log('====================='.green);
    console.log('Seleccione una Opción'.yellow);
    console.log('=====================\n'.green);

    const { opt } = await inquirer.prompt( questions );

    return opt;
}

const pause = async() => {
    console.log('\n');
    await inquirer.prompt( [{ type: 'input', name: 'enter', message: `Presione ${'enter'.green} para continuar...` }] );
}

const read_input = async( message ) => {
    const question = [
        {
            type: 'input', 
            name: 'description', 
            message, 
            validate( value ) {
                if( value.length === 0 ) {
                    return 'Ingrese un valor...';
                }
                return true;
            }
        }
    ];

    const { description } = await inquirer.prompt( question );
    return description;
}

const list_task = async( tasks = [] ) => {
    const choices = tasks.map( ( task, i) => {
        const index = `${i + 1}`.green;
        return {
            value: task.id, 
            name: `${ index }.- ${ task.description }`
        }
    });

    choices.unshift({
        value: '0', name: `0.- cancelar`
    });

    const questions = [
        {
            type: 'list', 
            name: 'id', 
            message: 'Borrar',
            choices
        }
    ];

    const { id } = await inquirer.prompt( questions );
    return id;
}

const confirm = async( message ) => {
    const question = [
        {
            type: 'confirm', 
            name: 'ok', 
            message
        }
    ];

    const { ok } = await inquirer.prompt( question );
    return ok; 
}

const checklist = async( tasks = [] ) => {
    const choices = tasks.map( ( task, i) => {
        const index = `${i + 1}`.green;
        return {
            value: task.id, 
            name: `${ index }.- ${ task.description }`,
            checked: (task.completed) ? true : false
        }
    });

    const questions = [
        {
            type: 'checkbox', 
            name: 'ids', 
            message: 'Selecciones',
            choices
        }
    ];

    const { ids } = await inquirer.prompt( questions );
    return ids;
}

module.exports = {
    inquirer_menu, 
    pause,
    read_input,
    list_task,
    confirm,
    checklist
}