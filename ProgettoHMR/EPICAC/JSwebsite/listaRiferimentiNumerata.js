$(function() {

    var list = $("#list1").find("li");

    // count the total number of <li>'s
    var count = $(list).length;

    // loop through each <li> and set value to a decreasing value of count
    list.each(function() {

        $(this).attr("value", count--);

    });

});

$(function() {

    var list = $("#list2").find("li");

    // count the total number of <li>'s
    var count = $(list).length;

    // loop through each <li> and set value to a decreasing value of count
    list.each(function() {

        $(this).attr("value", count--);

    });

});

$(function() {

    var list = $("#list3").find("li");

    // count the total number of <li>'s
    var count = $(list).length;

    // loop through each <li> and set value to a decreasing value of count
    list.each(function() {

        $(this).attr("value", count--);

    });

});

$(function() {

    var list = $("#list4").find("li");

    // count the total number of <li>'s
    var count = $(list).length;

    // loop through each <li> and set value to a decreasing value of count
    list.each(function() {

        $(this).attr("value", count--);

    });

});

