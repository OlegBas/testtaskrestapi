$(".user-search").on("input",function () {
    let field = $(this).attr('name');
    let value = $(this).val();
    // alert("http://testtaskrestapi.ru:81/search?field="+field+"&value="+value);
    $.ajax( "http://testtaskrestapi.ru:81/search?field="+field+"&value="+value)
        .done(function(data) {
           let users = JSON.parse(data);
           $("#users tbody").empty();

           for(let i = 0;i < users.length;i++){
               let row = "<tr>";
               let id = "<td>"+users[i]['id']+"</td>";
               let username = "<td>"+users[i]['username']+"</td>";
               let email = "<td>"+users[i]['email']+"</td>";
               row += id+username+email;
               row +=  "</tr>";
               $(row).appendTo("#users tbody");
           }

        })
        .fail(function() {
            alert( "error" );
        });
});