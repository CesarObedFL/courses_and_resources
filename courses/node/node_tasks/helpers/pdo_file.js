const fs = require('fs');

const file = './db/data.json';

const save_file = ( data ) => {
    fs.writeFileSync( file, JSON.stringify(data) );
}

const read_file = () => {
    if ( !fs.existsSync(file) ) {
        return null;
    }

    const info = fs.readFileSync( file, { encoding: 'utf-8'} );
    return JSON.parse( info );
}

module.exports = {
    save_file, read_file
}