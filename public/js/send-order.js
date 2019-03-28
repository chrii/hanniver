
// Prepares the CSRF Token for all AJAX Requests  in thes Script on Default
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

/** 
 * Post final Json String to MenuController storeBon
 * @response json
 * return:true/false
 * bill_id:{ id from active bill of the user }
 */
$('#send-order').on('click', function() {
    event.preventDefault();
    $.ajax({
        method: 'POST',
        url: '/menu/bon/send',
        success: function(response) {
            var json = JSON.parse(response);
            if( json.return ){
                console.log(json.return);
                window.location = 'http://localhost:8888/bill/';
            } else {
                alert(response.code);
            }
        },
        error: function (response) {
            console.log('failed');
        }
    });
    console.log('gesendet');
});