$("#get_button").click(function(params) {
    $.ajax({
        type: 'GET',
        url: `url/${params}`,
        dataType: 'json',
        success: function(response) {

            console.log(response);
            // JSON.parse transform a json string into a javascript object
            let resp = JSON.parse(response);
            console.log(resp);

        },
        error: function(response) {

            console.warn(response);

        }, 
    }); // endAjax
});

$("#post_button").click(function() {
    $.ajax({
        type: "POST",
        url: `url`,
        // JSON.stringify transform a javascript object into a json string
        data: JSON.stringify(data),
        dataType: 'json',
        success: function(response) {

            console.log(response);
            // JSON.parse transform a json string into a javascript object
            let resp = JSON.parse(response);
            console.log(resp);
            
        },
        error: function(response) {

            console.warn(response);

        },
        
    });
});