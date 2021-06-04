import {globalVariables} from './constants';
import * as accordionModule from './accordion.js';
import * as themeChangeModule from './nextTheme.js';
import * as checkboxModule from './checkboxes.js';
import * as modalModule from './modal.js';
import * as gotoAccordModule from './gotoAccord.js';

// refresh function
function refreshPage() {
    location.href = '#'
}

if ( globalVariables.doneBtn ) {
    // Valmis! button on click refreshes the page
    globalVariables.doneBtn.onclick = refreshPage;
}
