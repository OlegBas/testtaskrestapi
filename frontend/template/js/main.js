var url_api = "http://testtaskrestapi.ru:81";
$(".user-search").on("input",function () {
    let field = $(this).attr('name');
    let value = $(this).val();
    $.ajax( url_api+"/search?field="+field+"&value="+value)
        .done(function(data) {
           let users = JSON.parse(data);
           $("#users tbody").empty();

           for(let i = 0;i < users.length;i++){
               let row = "<tr>";
               let id = "<td>"+users[i]['id']+"</td>";
               let username = "<td>"+users[i]['username']+"</td>";
               let email = "<td>"+users[i]['email']+"</td>";
               let actions =  `<td><a href = "/frontend/update.php?id=${+users[i]['id']}" class="btn btn-default">Update</a>
<a  href = "/frontend/delete.php?id=${+users[i]['id']}" class="btn btn-danger">Delete</a></td>`;
               row += id+username+email+actions;
               row +=  "</tr>";
               $(row).appendTo("#users tbody");
           }

        })
        .fail(function() {
            alert( "error" );
        });
});