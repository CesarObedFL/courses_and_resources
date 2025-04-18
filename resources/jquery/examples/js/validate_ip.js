function validate_ip_address(ip_address) {
    const separator = ".";
    const number_of_terms = 4;
    let is_valid = true;

    terms = ip_address.split(separator, number_of_terms);

    terms.forEach(function(term) {
        term = parseInt(term, 10);
        if( Number.isInteger(term) ) {
            if(term < 0 || term > 255) {
                is_valid = false;
            }
        } else {
            is_valid = false;
        }
    });

    return is_valid;

}