import {globalVariables} from './constants';

// class toggler consts
const accordionPanel = document.getElementsByClassName('panel');
const accordionHeader = document.getElementsByClassName('accordion_header');

// disable add accordion button on click, because it only gives the remaining out of max currently
const moreAccordionBtn = document.getElementById('add_accordion_ajax');
if ( moreAccordionBtn ) {
  function kappa() {
    moreAccordionBtn.disabled = true;
    moreAccordionBtn.classList.add("page_view-disabled");
  }
  moreAccordionBtn.onclick =  kappa;
}

// event delegation for accordions. required for accordions added with ajax
if ( globalVariables.accordionContainer ) {
  globalVariables.accordionContainer.addEventListener('click', event => {
    if ( event.target.className === 'accordion' ) {
      for (const i of globalVariables.accordionBtn) {
        // class toggler function on accordion button click
        i.onclick = function () {
          const toggleActiveClass = !this.classList.contains('active');
          classToggler(globalVariables.accordionBtn, 'active', 'remove');
          classToggler(accordionPanel, 'accordion_show', 'remove');
          classToggler(accordionHeader, 'accordion_header-active', 'remove');
          classToggler(globalVariables.themeChangeBtn, 'themeBtnActive', 'remove');

          const findAccordionLastChild = this.nextElementSibling.childElementCount - 1;
          const findDivThemeBtn = this.nextElementSibling.children[findAccordionLastChild];
          const checkThemeBtnClass = findDivThemeBtn.classList.contains("theme_change");

          if (toggleActiveClass) {
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



//const getTestBtn = document.getElementById('add_accordion_ajax');