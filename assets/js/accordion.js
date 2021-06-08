import {globalVariables} from './constants';

// class toggler consts
const accordionPanel = document.getElementsByClassName('panel');
const accordionHeader = document.getElementsByClassName('accordion_header');

// disable add accordion button on click, because it only gives the remaining out of max currently
const moreAccordionBtn = document.getElementById('add_accordion_ajax');
if ( moreAccordionBtn ) {
  function disableMoreAccordionBtn() {
    moreAccordionBtn.disabled = true;
    moreAccordionBtn.classList.add("page_view-disabled");
  }
  moreAccordionBtn.onclick =  disableMoreAccordionBtn;
}

// event delegation for accordions. Required for accordions added with ajax
if ( globalVariables.accordionContainer ) {
  globalVariables.accordionContainer.addEventListener('click', event => {
    if ( event.target.className === 'accordion' ) {
      for (const i of globalVariables.accordionBtn) {
        // class toggler function on accordion button click
        i.onclick = function () {
          const isActiveClass = !this.classList.contains('active');
          classToggler(globalVariables.accordionBtn, 'active', 'remove');
          classToggler(accordionPanel, 'accordion_show', 'remove');
          classToggler(accordionHeader, 'accordion_header-active', 'remove');
          classToggler(globalVariables.themeChangeBtn, 'themeBtnActive', 'remove');

          const findAccordionLastChild = this.nextElementSibling.childElementCount - 1;
          const findDivThemeBtn = this.nextElementSibling.children[findAccordionLastChild];
          const checkThemeBtnClass = findDivThemeBtn.classList.contains("theme_change");

          if (isActiveClass) {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("accordion_show");
            this.children[0].classList.toggle("accordion_header-active");

            if (checkThemeBtnClass) {
              findDivThemeBtn.children[0].classList.toggle("themeBtnActive");
            }
          }
        }
      }
    }; // end if

  }); // end eventlistener
}
// template for class toggling
const classToggler = (els, className, fnName) => {
  for (let i of els) {
    i.classList[fnName](className);
  }
}

// Closes currently active accordions
// Required for accordions added with ajax to avoid user confusion (can't click next theme button if accordions were created with an active header)
const ajaxButton = document.getElementById('add_accordion_ajax');
if ( ajaxButton ) {
    ajaxButton.addEventListener('click', event => {

    const currentlyActiveHeader = document.getElementsByClassName('active');
    const currentlyActivePanel = currentlyActiveHeader[0].nextElementSibling;
    const activeHeaderChild = currentlyActiveHeader[0].children[0];

    // find the active class to close
    const isActiveHeader = currentlyActiveHeader[0].classList.contains('active');

      if ( isActiveHeader  ) {
        // accordion active remove
        currentlyActiveHeader[0].classList.remove("active");
        activeHeaderChild.classList.remove("accordion_header-active");

        // panel active remove
        currentlyActivePanel.classList.remove('accordion_show');
      }
  }); // listener end
} // if end