
// $(document).ready(function() {
//  $('.menu-item .pc').click(function() {
//          ('.search-box').toggle();
//      });
//  });

// function search($busq){
//     const getcon = document.getElementById(cat+'id'+val);
//     const setcon = document.getElementById('con');
//     const url = "vercontenido.php?mae="+getcon.innerHTML;
//     setcon.value = getcon.innerHTML;
//     setcon.href = url;
  
// }
// // alert("hoja js");
// // $('#searchItem').click(function() {
// //     $('#searchInput').show();
// //     alert("entro");
// //   });
  
// //   $('#searchInput').on('input', function() {
// //     var query = $(this).val();
// //     if (query.length > 0) {
// //       $.get('fetch.php', { q: query }, function(data) {
// //         var results = JSON.parse(data);
// //         $('#results').empty().show();
// //         results.forEach(function(result) {
// //           $('#results').append('<li>' + result + '</li>');
// //         });
// //       });
// //     } else {
// //       $('#results').hide();
// //     }
// //   });
// document.getElementById('searchItem').addEventListener('click', function() {
//   if (document.getElementById('searchInput').style.display === 'block') {
//       document.getElementById('searchInput').style.display = 'none';
//   }
//   if (document.getElementById('searchInput').style.display === 'none') {
//     document.getElementById('searchInput').style.display = 'block';
// }
//   });
  
//   function fetchResults(query) {
//     if (query.length > 0) {
//       var xhr = new XMLHttpRequest();
//       xhr.open("GET", "fetch.php?q=" + query, true);
//       xhr.onreadystatechange = function() {
//         if (this.readyState == 4 && this.status == 200) {
//           var results = JSON.parse(this.responseText);
//           var resultsContainer = document.getElementById('results');
//           resultsContainer.style.display = 'block';
//          // resultsContainer.innerHTML = '';
//           for (var i = 0; i < results.length; i++) {
//             var li = document.createElement('li'+i);
//             li(i).textContent = results[i];
//             resultsContainer.appendChild(li);
//           }
//         }
//       };
//       xhr.send();
//     } else {
//       document.getElementById('results').style.display = 'none';
//     }
//   }
//  document.getElementById('searchItem').addEventListener('focusout', disabled());
 
//  function disabled(){
//   alert("Input field lost focus.");
//     document.getElementById('searchInput').style.display = 'none';
//  }
    
  