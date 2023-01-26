const { read_input, inquirer_menu, pause } = require('./helpers/inquirer');
const { Searches } = require('./models/searches');


const main = async() => {
    
    let opt = '';

    const searches = new Searches();

    do {

        opt = await inquirer_menu();

        switch( opt ) {
            case '1': 
                const place = await read_input('Ciudad: ');
                await searches.city( place );

                console.log( place );
                console.log('\nInformación del lugar');
                console.log('Ciudad: ');
                console.log('Lat: ');
                console.log('Lng: ');
                console.log('Temperatura: ');
                console.log('Mínima: ');
                console.log('Máxima: ');
                break;
            
            case '2': 
            break;
        }


        if (opt !== '0') await pause();

    } while (opt != '0');


}


main();