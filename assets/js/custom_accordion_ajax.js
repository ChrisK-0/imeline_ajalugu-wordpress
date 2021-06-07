/*
// practice for vanilla JS ajax
// test#2
var request = new XMLHttpRequest();

request.open('POST', frontend_ajax_object.ajaxurl, true);
request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded;');
request.onload = function () {
    if (this.status >= 200 && this.status < 400) {
        // If successful
        console.log(this.response);
    } else {
        // If fail
        console.log(this.response);
    }
};
request.send('action=get_ajax_posts');

var ajax_accordion = this;
        
var get_acc_container = document.getElementsByClassName('accordion_container');
var acc_add_btn = document.getElementById('add_accordion_ajax');

acc_add_btn.onclick = function(){
    get_acc_container.appendChild( ajax_accordion );
};

// test#1
request({ url: frontend_ajax_object.ajaxurl + "?action=get_ajax_posts" })
    .success( 
        function (response) {
            var get_acc_container = document.getElementsByClass('accordion_container');
            get_acc_container.appendChild(response);
        }
    )
    .error(thenError);
*/

// next theme checker
function checkNextThemeBtn() {
    // const if ajax cant get it
    const accordionPanel = document.getElementsByClassName('panel');
  
    let panelDivLength = accordionPanel.length;
    let panelDivLast = panelDivLength-1;
    let panelThemeBtnDiv = document.getElementsByClassName('panel_next');
    
  
  
  
    for ( let i=0; i<panelDivLength; i++ ) {
  
      // if is last or already contains panel_next and btn
      if ( i == panelDivLast /*is last panel*/ || accordionPanel[i].lastElementChild.contains(panelThemeBtnDiv[i]) /*already has div*/ ) {
        // continue - avoid adding next_theme button
        continue;
      } else {
          // create next theme parts
          let createNextDiv = document.createElement("DIV"); // create panel_next
          createNextDiv.className = 'panel_next';
          let createNextBtn = document.createElement("BUTTON");
          createNextBtn.className = 'next_theme';
          createNextBtn.innerHTML = 'Järgmine teema';
          createNextDiv.appendChild(createNextBtn);
  
        accordionPanel[i].appendChild(createNextDiv); // append to current panel
  
      }
    } // for end
  
  } // function end


jQuery(document).ready(function() {
    jQuery.ajax({
        type: 'POST',
        url: frontend_ajax_object.ajaxurl,
        dataType: "html",
        data: { action : 'get_ajax_posts' },
        success: function( response ) {

            jQuery('#add_accordion_ajax').click(function() {
                jQuery( response ).appendTo('.accordion_container');
                // run checkNextThemeBtn()
                checkNextThemeBtn();
            })
        },
    });
});
