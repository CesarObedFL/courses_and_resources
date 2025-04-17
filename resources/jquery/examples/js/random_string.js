function random_string(string_lenght) {
    let result = '';
    let characters = 'ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz0123456789';

    let characters_lenght = characters.length;

    for ( var i = 0; i < string_lenght; i++ ) {
        result += characters.charAt( Math.floor( Math.random() * characters_lenght ) );
    }

    return result;

}