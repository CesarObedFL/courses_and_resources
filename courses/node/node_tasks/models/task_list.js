const { Task } = require("./task");

class TaskList {
    _list = {};

    get list_array() {
        const array_list = [];
        Object.keys(this._list).forEach( key => {
            const task = this._list[key];
            array_list.push( task );
        } );
        return array_list;
    }

    constructor() {
        this._list = {};
    }

    load_list( array_task_list = [] ) {
        array_task_list.forEach( task => {
            this._list[task.id] = task;
        });
    }

    create( description = '' ) {
        const task = new Task(description);
        this._list[task.id] = task;
    }

    listing( filter = null ) {
        this.list_array.forEach( (task, i) => {
            const { description, completed } = task;
            if ( filter ) {
                if( filter == 'completed' ) {
                    if ( completed ) {
                        const index = `${i + 1}`.green;
                        console.log( `${index}.- ${description} :: ${completed}` );
                    }
                } else {
                    if ( !completed ) {
                        const index = `${i + 1}`.green;
                        console.log( `${index}.- ${description} :: ${'pendiente'.red}` );
                    }
                }
            } else {
                const status = (completed) ? 'completada'.green : 'pendiente'.red;
                const index = `${i + 1}`.green;
                console.log( `${index}.- ${description} :: ${status}` );
            }
        });
    }

    delete_task( id = '' ) {
        if( this._list[id] ) {
            delete this._list[id];
        }
    }

    toggle_task( ids = [] ) {
        ids.forEach( id => {
            const task = this._list[id];
            if( !task.completed ) {
                task.completed = new Date().toISOString();
            }
        });

        this.list_array.forEach( task => {
            if( !ids.includes(task.id) ) {
                this._list[task.id].completed = null;
            }
        });
    }

}


module.exports = {
    TaskList
};