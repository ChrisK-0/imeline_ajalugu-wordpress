import * as accordionModule from './accordion.js';
import * as themeChangeModule from './nextTheme.js';
import * as checkboxModule from './checkboxes.js';
import * as modalModule from './modal.js';
import * as gotoAccordModule from './gotoAccord.js';
import {globalVariables} from './constants';

// refresh function
function refreshPage() {
    location.href = 'index.html'
}

// Valmis! button on click refreshes the page
globalVariables.doneBtn.onclick = refreshPage;