function typeNumber(event, type, input_value) {
    const BACKSPACE = 8, DOT = 46;
    key = event.keyCode || event.which;
    KEY = String.fromCharCode(key).toLowerCase();
    numbers = "0123456789";
    specials = [BACKSPACE];
 
 
    if (type == 2) // floats
        specials = [BACKSPACE,DOT];
 
 
    // se revisa si es un caracter especial el que se tipea
    specialKey = false
    for(var i in specials) {
        if(key == specials[i]){
            specialKey = true;
            break;
        }
    }
 
 
    // se revisa si ya existe un punto dentro del número tipeado para no permitir dos
    for(var i in input_value) {
        if(KEY == input_value[i] && key == DOT) {
            return false;
        }
    }
 
 
    // se revisa si lo que se tipeo esta dentro de la cadena de números o es un caracter especial
    if(numbers.indexOf(KEY)==-1 && !specialKey)
        return false;

    return true;
}
 