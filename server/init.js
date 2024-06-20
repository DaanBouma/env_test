//! ---------------------------------------------------------------------------!//
//!                              Request                                       !//
//! ---------------------------------------------------------------------------!//

function init_php(divID)
{

fetch('client/Config.php', {
  method: 'POST', 
  headers: {
    'Content-Type': 'application/json',
  },
})
.then(response => response.text()) 
.then(data => {

//! ---------------------------------------------------------------------------!//
//!                           Copies echo function                             !//
//! ---------------------------------------------------------------------------!//
eval(data);

})
.catch((error) => {
  console.error("[Dynamic Containers] There is a error while requesting script.");
});

//! ---------------------------------------------------------------------------!//
//!                                 End                                        !//
//! ---------------------------------------------------------------------------!//

}
document.addEventListener('DOMContentLoaded', (event) => {
  var elements = document.getElementsByClassName('dync');

  for(var i = 0; i < elements.length; i++) {
    //! Function to fill in all DC classes
      const div = elements[i];
      const divID = div.id;
      init_php(divID);
  }
});
