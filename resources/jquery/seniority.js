function seniority(date_from, date_to) {
    init_date = date_from.split('-', 3);
    end_date = date_to.split('-', 3);

    if( end_date[1] == 12 ) {
        var from = new Date(parseInt(init_date[2]), parseInt(init_date[1])-1, parseInt(init_date[0]));
        var to = new Date(parseInt(end_date[2]), parseInt(end_date[1])-1, parseInt(end_date[0]));
    } else {
        var from = new Date(parseInt(init_date[2]), parseInt(init_date[1]), parseInt(init_date[0]));
        var to = new Date(parseInt(end_date[2]), parseInt(end_date[1]), parseInt(end_date[0]));
    }

    var day = to.getDate() - from.getDate();
    var month = to.getMonth() - from.getMonth();
    var year = to.getFullYear() - from.getYear();

    return year + 'Y' + month + 'M' + day + 'D';
}