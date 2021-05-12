import {globalVariables} from './constants';

const allCheckboxes = document.querySelectorAll("input[type=checkbox][class=panel_input]");

// arrays for checking the current accordion checked checkbox lengths
let activeCheckboxArray = [];
let checkedBoxesArray = [];

allCheckboxes.forEach(function (checkbox) {
  checkbox.addEventListener('change', function () {
    const currentlyAvailableCheckboxes = globalVariables.openedPanel[0].querySelectorAll("input[type=checkbox][class=panel_input]");

    let checkedBoxesArray =
      Array.from(currentlyAvailableCheckboxes) // Convert checkboxes to an array to use filter and map.
        .filter(i => i.checked) // Use Array.filter to remove unchecked checkboxes.
        .map(i => i.value); // Use Array.map to extract only the checkbox values from the array of objects.
    // (for developement) console.log(checkedBoxesArray);

    let activeAccordionSpan = globalVariables.activeAccordion[0].children[1].children[0];

    if (checkedBoxesArray.length == 0) {
      activeAccordionSpan.innerHTML = 0;

    }
    // When counter is equal to 3, set the counter to 3 / 3 and disable unchecked checkboxes
    else if (checkedBoxesArray.length == 3) {
      activeAccordionSpan.innerHTML = 3;

      for (let i of currentlyAvailableCheckboxes) {

        // disables unchecked checkboxes when array has length of 3 (3 checkboxes are checked)
        if (!i.checked) {
          i.disabled = true;
          i.parentElement.classList.add("checkbox-disabled");

        }

      }

    }
    // If it is less than 3, increment it by 1 whenever a checkbox gets checked. Also remove disabled from disabled checkboxes
    else if (checkedBoxesArray.length < 3) {

      for (let i of currentlyAvailableCheckboxes) {
        if (i.disabled) {
          i.disabled = false;
          i.parentElement.classList.remove("checkbox-disabled");

        }

      }
      activeAccordionSpan.innerHTML = checkedBoxesArray.length;

    }
    for (let i of globalVariables.accordionBtn) {
      let accordBtnSpan = i.children[1].children[0];

      if (accordBtnSpan.innerHTML > 0 && activeCheckboxArray.length < globalVariables.accordionBtn.length && activeCheckboxArray.includes(i) == false) {
        activeCheckboxArray.push(i);

      } else if (accordBtnSpan.innerHTML == 0) {
        // array gets reset when atleast 1 span is 0, resulting in the array.length not being equal to the amount of accordion blocks
        activeCheckboxArray = [];
        globalVariables.doneBtn.disabled = true;
        globalVariables.doneBtn.classList.add("btn-disabled");
      }

      if (activeCheckboxArray.length == globalVariables.accordionBtn.length) {
        globalVariables.doneBtn.disabled = false;
        globalVariables.doneBtn.classList.remove("btn-disabled");

      }
      // (for developement) console.log(activeCheckboxArray.length)
    }

  })

})


// checkbox background color variables
const accordionInput = document.getElementsByClassName("panel_input");
// Whenver a checkbox is checked, it will gain background coloring
function isChecked() {
    if (this.checked) {
      this.parentElement.style.backgroundColor = "#fff8cd";
  
    } else {
      this.parentElement.style.backgroundColor = "";
  
    }
  }
  
  // checkbox background color event listener
  for (let i of accordionInput) {
    i.addEventListener("change", isChecked);
  
  }

