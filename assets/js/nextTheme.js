import {globalVariables} from './constants';
// gathers first currently active accordion details
// for nextTheme.js
const activeHeader = document.getElementsByClassName("accordion_header-active");
const activeThemeBtn = document.getElementsByClassName("themeBtnActive");


// declared function for the theme change buttons
const nextTheme = () => {
    // gets next elements before the 3 special classes are removed with nextElementSibling
    const nextAccordion = globalVariables.activeAccordion[0].nextElementSibling.nextElementSibling;
    const nextPanel = globalVariables.openedPanel[0].nextElementSibling.nextElementSibling;
    const nextHeader = globalVariables.activeAccordion[0].nextElementSibling.nextElementSibling.children[0];
  
    // adds 3 actives to the next ones
    nextPanel.classList.add("accordion_show");
    nextHeader.classList.add("accordion_header-active");
    nextAccordion.classList.add("active");
  
    // removes the first found active class and since now there are 2, it removes the 3 classes from the first to close it, because only 1 accordion should be open at a time
    globalVariables.activeAccordion[0].classList.remove("active");
    globalVariables.openedPanel[0].classList.remove("accordion_show");
    activeHeader[0].classList.remove("accordion_header-active");
  
    const findAccordionLastChild = nextAccordion.nextElementSibling.childElementCount - 1;
    const findDivThemeBtn = nextAccordion.nextElementSibling.children[findAccordionLastChild];
    const checkThemeBtnClass = findDivThemeBtn.classList.contains("theme_change");
  
  
    if (typeof activeThemeBtn[0] !== "undefined" && checkThemeBtnClass) {
      findDivThemeBtn.children[0].classList.add("themeBtnActive");
      activeThemeBtn[0].classList.remove("themeBtnActive");
  
    } /* else {
      (for developement) console.log("There is no next theme button");
  
    } */  
}

// Next theme button. Closest the current one and opens the next one
for (const i of globalVariables.themeChangeBtn) {
  i.onclick = nextTheme;
}

