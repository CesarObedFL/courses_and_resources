function seniority(date_from, date_to) {
    init_date = date_from.split('-', 3);
    end_date = date_to.split('-', 3);
    
    var from = new Date(parseInt(init_date[0]), parseInt(init_date[1])-1, parseInt(init_date[2]));
    var to = new Date(parseInt(end_date[0]), parseInt(end_date[1])-1, parseInt(end_date[2]));

    var day = to.getDate() - from.getDate();
    var month = to.getMonth() - from.getMonth();
    var year = to.getFullYear() - from.getFullYear();

    return year + ' Years, ' + month + ' Months, ' + day + ' Days ';
}