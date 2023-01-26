require('colors');

const { 
    inquirer_menu, 
    pause,
    read_input,
    list_task, 
    confirm,
    checklist
} = require('./helpers/inquirer');
const { Task } = require('./models/task');
const { TaskList } = require('./models/task_list');
const { save_file, read_file } = require('./helpers/pdo_file');
const main = async() => {

    let opt = '';
    
    const tasks = new TaskList();

    const task_list_saved = read_file();

    if ( task_list_saved ) {
        tasks.load_list( task_list_saved );
    }

    //await pause();

    do {
    
        opt = await inquirer_menu();
        console.log( { opt } );

        switch( opt ) {
            case '1': 
                const description = await read_input('Descripción:');
                tasks.create(description);
                break;

            case '2': tasks.listing(); break;
            case '3': tasks.listing('completed'); break;
            case '4': tasks.listing('pending'); break;
            case '5':
                const ids = await checklist( tasks.list_array );
                tasks.toggle_task( ids );
                break;
            case '6':
                const id = await list_task( tasks.list_array );
                if (id !== '0') {
                    if( await confirm('Esta seguro que desea eliminar?...') ) {
                        tasks.delete_task( id );
                    }
                }
                break;
        }

        await pause();
    
    } while( opt !== '0');

    save_file( tasks.list_array );

    console.log('Saliendo...'.red);
    
}


main();