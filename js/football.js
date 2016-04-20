// jQuery(document).ready(function($) {
//     //  //*API BUILDER SYSTEM*//
//     $('#loading-image').show();
//     $.ajax({
//         url: "http://api-dev.qstrike.com/api/materials/category/upper/Football",
//         type: "GET",
//         dataType: 'json',
//         success: function(data) {
//             $.each(data['materials'], function(i, item) {

//                 var name = item.name;
//                 var excerpt = name.substr(0, 10) + '..';
//                 var nameF = name.replace(/_/g, " ");
//                 var id = item.id;
//                 var thumbs = item.thumbnail_path;
//                 var place_holder = "http://192.168.1.29/wp-content/uploads/2016/04/FB_BASE.png"
//                     // var excerpt = $(name).text($(name).text().substr(0, 6) + '...');


//                 // console.log(excerpt);

//                 if (thumbs) {
//                     var uniform = item.thumbnail_path;

//                 } else {
//                     var uniform = place_holder;
//                 }

//                 var fbElem = "<div class='column wow fadeIn'>";
//                 fbElem += "<div class='uniform-wrapper'>";
//                 fbElem += "<img src='" + uniform + "'>";
//                 fbElem += "<h2>" + nameF + "</h2>";
//                 fbElem += "<p id='ex'>" + nameF + "</p>";
//                 fbElem += "<a href='http://alpha.qstrike.com/builder/0/" + id + "'>GO BUILD</a>";
//                 fbElem += "</div>";
//                 fbElem += "</div>";

//                 $("#footaball-uniform-all").append(fbElem);
//                 // console.log(item);

//             });
//         },
//         complete: function() {
//             $('#loading-image').hide();
//         }
//     });

// });