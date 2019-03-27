"use strict"

var table = $('table');

// Prepares the CSRF Token for all AJAX Requests  in thes Script on Default
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Button for Count the Product down
table.find('#down').on('click', function(){
    var box = $(this).parent().siblings().find('#valueBox');
    if(box.html() <= 0) {
        alert('Sie sind schon bei 0');
    } else {
        box.html(function(i, val) { return val*1-1 });
    }
});

//Button to count the Product up
table.find('#up').on('click', function(){
    var box = $(this).parent().siblings().find('#valueBox');
    
    if(box.html() >= 10) {
        alert('Bitte bestellen Sie beim Kellner bei Bestellungen über 10 Produkten');
    } else {
        box.html(function(i, val) { return val * 1 + 1 });

    }
});

/** 
 * Fetch all Product IDs and the Quantity
 * @return JSON
 */
$('.testButton').on('click', function(){
    event.preventDefault();
    var json = '';
    $('table #valueBox').each(function(){
        var quantity = $(this).html();
        var product = $(this).attr('name').toString();
        if(quantity != 0){
            json += '"' + product + '":"' + quantity + '",';
        }
    });
    json = json.substring(0, json.length - 1);
    json = "{" + json + "}";
    console.log(JSON.parse(json));
    document.cookie = 'bonString' + '=' + '';

    /**
     * Opens an Ajax Call and sends the JSON string to MenuController
     * 
     */
    $.ajax({
        method: 'POST',
        data: {'bon':json},
        url: 'http://localhost:8888/menu/bon',
        success: function(response) {
            console.log(response);
            window.location = 'http://localhost:8888/menu/bon';
        },
        error: function(response) {
            alert('Nein');
            //location.replace = '/menu';
        }
    });
});


