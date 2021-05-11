/*
 * ATTENTION: The "eval" devtool has been used (maybe by default in mode: "development").
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/sass/main.scss":
/*!****************************!*\
  !*** ./src/sass/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"default\": () => (__WEBPACK_DEFAULT_EXPORT__)\n/* harmony export */ });\n/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__webpack_require__.p + \"main.css\");\n\n//# sourceURL=webpack://imeline_ajalugu/./src/sass/main.scss?");

/***/ }),

/***/ "./src/js/accordion.js":
/*!*****************************!*\
  !*** ./src/js/accordion.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./constants */ \"./src/js/constants.js\");\n\r\n\r\nconst accordionPanel = document.getElementsByClassName('panel');\r\nconst accordionHeader = document.getElementsByClassName('accordion_header');\r\n\r\nfor (let i of _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.accordionBtn) {\r\n  // class toggler function on accordion button click\r\n  i.onclick = function () {\r\n    const toggleActiveClass = !this.classList.contains('active');\r\n    classToggler(_constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.accordionBtn, 'active', 'remove');\r\n    classToggler(accordionPanel, 'accord_show', 'remove');\r\n    classToggler(accordionHeader, 'accordion_header-active', 'remove');\r\n    classToggler(_constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.themeChangeBtn, 'themeBtnActive', 'remove');\r\n\r\n    const findAccordionLastChild = this.nextElementSibling.childElementCount - 1;\r\n    const findDivThemeBtn = this.nextElementSibling.children[findAccordionLastChild];\r\n    const checkThemeBtnClass = findDivThemeBtn.classList.contains(\"theme_change\");\r\n\r\n    if (toggleActiveClass) {\r\n      this.classList.toggle(\"active\");\r\n      this.nextElementSibling.classList.toggle(\"accord_show\");\r\n      this.children[0].classList.toggle(\"accordion_header-active\");\r\n\r\n      if (checkThemeBtnClass) {\r\n        findDivThemeBtn.children[0].classList.toggle(\"themeBtnActive\");\r\n        // (for developement) console.log('theme btn found')\r\n\r\n      } else {\r\n        // (for developement) console.log(\"There is no next accordion to give theme change button active class\");\r\n      }\r\n\r\n    }\r\n\r\n  }\r\n\r\n}\r\n\r\n// template for class toggling\r\nconst classToggler = (els, className, fnName) => {\r\n  for (let i of els) {\r\n    i.classList[fnName](className);\r\n  }\r\n}\r\n\r\n\n\n//# sourceURL=webpack://imeline_ajalugu/./src/js/accordion.js?");

/***/ }),

/***/ "./src/js/checkboxes.js":
/*!******************************!*\
  !*** ./src/js/checkboxes.js ***!
  \******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./constants */ \"./src/js/constants.js\");\n\r\n\r\nconst allCheckboxes = document.querySelectorAll(\"input[type=checkbox][class=panel_input]\");\r\n\r\n// arrays for checking the current accordion checked checkbox lengths\r\nlet activeCheckboxArray = [];\r\nlet checkedBoxesArray = [];\r\n\r\nallCheckboxes.forEach(function (checkbox) {\r\n  checkbox.addEventListener('change', function () {\r\n    const currentlyAvailableCheckboxes = _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.openedPanel[0].querySelectorAll(\"input[type=checkbox][class=panel_input]\");\r\n\r\n    let checkedBoxesArray =\r\n      Array.from(currentlyAvailableCheckboxes) // Convert checkboxes to an array to use filter and map.\r\n        .filter(i => i.checked) // Use Array.filter to remove unchecked checkboxes.\r\n        .map(i => i.value); // Use Array.map to extract only the checkbox values from the array of objects.\r\n    // (for developement) console.log(checkedBoxesArray);\r\n\r\n    let activeAccordionSpan = _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.activeAccordion[0].children[1].children[0];\r\n\r\n    if (checkedBoxesArray.length == 0) {\r\n      activeAccordionSpan.innerHTML = 0;\r\n\r\n    }\r\n    // When counter is equal to 3, set the counter to 3 / 3 and disable unchecked checkboxes\r\n    else if (checkedBoxesArray.length == 3) {\r\n      activeAccordionSpan.innerHTML = 3;\r\n\r\n      for (let i of currentlyAvailableCheckboxes) {\r\n\r\n        // disables unchecked checkboxes when array has length of 3 (3 checkboxes are checked)\r\n        if (!i.checked) {\r\n          i.disabled = true;\r\n          i.parentElement.classList.add(\"checkbox-disabled\");\r\n\r\n        }\r\n\r\n      }\r\n\r\n    }\r\n    // If it is less than 3, increment it by 1 whenever a checkbox gets checked. Also remove disabled from disabled checkboxes\r\n    else if (checkedBoxesArray.length < 3) {\r\n\r\n      for (let i of currentlyAvailableCheckboxes) {\r\n        if (i.disabled) {\r\n          i.disabled = false;\r\n          i.parentElement.classList.remove(\"checkbox-disabled\");\r\n\r\n        }\r\n\r\n      }\r\n      activeAccordionSpan.innerHTML = checkedBoxesArray.length;\r\n\r\n    }\r\n    for (let i of _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.accordionBtn) {\r\n      let accordBtnSpan = i.children[1].children[0];\r\n\r\n      if (accordBtnSpan.innerHTML > 0 && activeCheckboxArray.length < _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.accordionBtn.length && activeCheckboxArray.includes(i) == false) {\r\n        activeCheckboxArray.push(i);\r\n\r\n      } else if (accordBtnSpan.innerHTML == 0) {\r\n        // array gets reset when atleast 1 span is 0, resulting in the array.length not being equal to the amount of accordion blocks\r\n        activeCheckboxArray = [];\r\n        _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.doneBtn.disabled = true;\r\n        _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.doneBtn.classList.add(\"btn-disabled\");\r\n      }\r\n\r\n      if (activeCheckboxArray.length == _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.accordionBtn.length) {\r\n        _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.doneBtn.disabled = false;\r\n        _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.doneBtn.classList.remove(\"btn-disabled\");\r\n\r\n      }\r\n      // (for developement) console.log(activeCheckboxArray.length)\r\n    }\r\n\r\n  })\r\n\r\n})\r\n\r\n\r\n// checkbox background color variables\r\nconst accordionInput = document.getElementsByClassName(\"panel_input\");\r\n// Whenver a checkbox is checked, it will gain background coloring\r\nfunction isChecked() {\r\n    if (this.checked) {\r\n      this.parentElement.style.backgroundColor = \"#fff8cd\";\r\n  \r\n    } else {\r\n      this.parentElement.style.backgroundColor = \"\";\r\n  \r\n    }\r\n  }\r\n  \r\n  // checkbox background color event listener\r\n  for (let i of accordionInput) {\r\n    i.addEventListener(\"change\", isChecked);\r\n  \r\n  }\r\n  \n\n//# sourceURL=webpack://imeline_ajalugu/./src/js/checkboxes.js?");

/***/ }),

/***/ "./src/js/constants.js":
/*!*****************************!*\
  !*** ./src/js/constants.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony export */ __webpack_require__.d(__webpack_exports__, {\n/* harmony export */   \"globalVariables\": () => (/* binding */ globalVariables)\n/* harmony export */ });\nconst globalVariables = {\r\n    themeChangeBtn : document.getElementsByClassName('next_theme'),\r\n    accordionBtn : document.getElementsByClassName('accordion'),\r\n    openedPanel : document.getElementsByClassName(\"accord_show\"),\r\n    activeAccordion : document.getElementsByClassName(\"active\"),\r\n    doneBtn : document.getElementById(\"doneButton\")\r\n};\r\n\n\n//# sourceURL=webpack://imeline_ajalugu/./src/js/constants.js?");

/***/ }),

/***/ "./src/js/gotoAccord.js":
/*!******************************!*\
  !*** ./src/js/gotoAccord.js ***!
  \******************************/
/***/ (() => {

eval("// scrolls to accordion on red anchor text click\r\nconst scrollAnchor = document.getElementById(\"accordionTitle\");\r\nfunction scrollToAccord() {\r\n  scrollAnchor.scrollIntoView({ behavior: \"smooth\", block: \"start\" });\r\n\r\n}\r\n\r\ndocument.getElementById(\"gotoAccordionAnchor\").onclick = scrollToAccord;\r\n\n\n//# sourceURL=webpack://imeline_ajalugu/./src/js/gotoAccord.js?");

/***/ }),

/***/ "./src/js/main.js":
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _accordion_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./accordion.js */ \"./src/js/accordion.js\");\n/* harmony import */ var _nextTheme_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./nextTheme.js */ \"./src/js/nextTheme.js\");\n/* harmony import */ var _checkboxes_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./checkboxes.js */ \"./src/js/checkboxes.js\");\n/* harmony import */ var _modal_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modal.js */ \"./src/js/modal.js\");\n/* harmony import */ var _modal_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_modal_js__WEBPACK_IMPORTED_MODULE_3__);\n/* harmony import */ var _gotoAccord_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./gotoAccord.js */ \"./src/js/gotoAccord.js\");\n/* harmony import */ var _gotoAccord_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_gotoAccord_js__WEBPACK_IMPORTED_MODULE_4__);\n/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./constants */ \"./src/js/constants.js\");\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n// refresh function\r\nfunction refreshPage() {\r\n    location.href = 'index.html'\r\n}\r\n\r\n// Valmis! button on click refreshes the page\r\n_constants__WEBPACK_IMPORTED_MODULE_5__.globalVariables.doneBtn.onclick = refreshPage;\n\n//# sourceURL=webpack://imeline_ajalugu/./src/js/main.js?");

/***/ }),

/***/ "./src/js/modal.js":
/*!*************************!*\
  !*** ./src/js/modal.js ***!
  \*************************/
/***/ (() => {

eval("// get the modal\r\nlet modal = document.getElementById(\"policyModal\");\r\n// get the anchor text that opens the modal\r\nlet openModal = document.getElementById(\"policyOpen\");\r\n// get the <span> element that closes the modal\r\nlet closeModalBtn = document.getElementById(\"closeModal\");\r\n// modal closing function\r\ncloseModal = () => {\r\n  modal.style.display = \"none\";\r\n\r\n};\r\n\r\n// when the user clicks on the anchor text, open the modal\r\nopenModal.onclick = () => {\r\n  modal.style.display = \"block\";\r\n\r\n}\r\n\r\n// when the user clicks on <span> (x), close the modal\r\ncloseModalBtn.onclick = closeModal;\r\n\r\n// when the user clicks ESC on their keyboard, close the modal\r\nwindow.addEventListener('keydown', function (event) {\r\n  if (event.key === 'Escape') {\r\n    closeModal();\r\n\r\n  }\r\n\r\n});\r\n\r\n// when the user clicks anywhere outside of the modal, close it (also added ESC key)\r\nwindow.onclick = function (event) {\r\n  if (event.target == modal) {\r\n    closeModal();\r\n\r\n  }\r\n\r\n}\r\n\n\n//# sourceURL=webpack://imeline_ajalugu/./src/js/modal.js?");

/***/ }),

/***/ "./src/js/nextTheme.js":
/*!*****************************!*\
  !*** ./src/js/nextTheme.js ***!
  \*****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var _constants__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./constants */ \"./src/js/constants.js\");\n\r\n\r\n// gathers first currently active accordion details\r\n// for nextTheme.js\r\nconst activeHeader = document.getElementsByClassName(\"accordion_header-active\");\r\nconst activeThemeBtn = document.getElementsByClassName(\"themeBtnActive\");\r\n\r\n\r\n// declared function for the theme change buttons\r\nconst nextTheme = () => {\r\n    // gets next elements before the 3 special classes are removed with nextElementSibling\r\n    const nextAccordion = _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.activeAccordion[0].nextElementSibling.nextElementSibling;\r\n    const nextPanel = _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.openedPanel[0].nextElementSibling.nextElementSibling;\r\n    const nextHeader = _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.activeAccordion[0].nextElementSibling.nextElementSibling.children[0];\r\n  \r\n    // adds 3 actives to the next ones\r\n    nextPanel.classList.add(\"accord_show\");\r\n    nextHeader.classList.add(\"accordion_header-active\");\r\n    nextAccordion.classList.add(\"active\");\r\n  \r\n    // removes the first found active class and since now there are 2, it removes the 3 classes from the first to close it, because only 1 accordion should be open at a time\r\n    _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.activeAccordion[0].classList.remove(\"active\");\r\n    _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.openedPanel[0].classList.remove(\"accord_show\");\r\n    activeHeader[0].classList.remove(\"accordion_header-active\");\r\n  \r\n    const findAccordionLastChild = nextAccordion.nextElementSibling.childElementCount - 1;\r\n    const findDivThemeBtn = nextAccordion.nextElementSibling.children[findAccordionLastChild];\r\n    const checkThemeBtnClass = findDivThemeBtn.classList.contains(\"theme_change\");\r\n  \r\n  \r\n    if (typeof activeThemeBtn[0] !== \"undefined\" && checkThemeBtnClass) {\r\n      findDivThemeBtn.children[0].classList.add(\"themeBtnActive\");\r\n      activeThemeBtn[0].classList.remove(\"themeBtnActive\");\r\n  \r\n    } /* else {\r\n      (for developement) console.log(\"There is no next theme button\");\r\n  \r\n    } */\r\n  \r\n  }\r\n  // Next theme button. Closest the current one and opens the next one\r\n  for (const i of _constants__WEBPACK_IMPORTED_MODULE_0__.globalVariables.themeChangeBtn) {\r\n    i.onclick = nextTheme;\r\n  }\n\n//# sourceURL=webpack://imeline_ajalugu/./src/js/nextTheme.js?");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/global */
/******/ 	(() => {
/******/ 		__webpack_require__.g = (function() {
/******/ 			if (typeof globalThis === 'object') return globalThis;
/******/ 			try {
/******/ 				return this || new Function('return this')();
/******/ 			} catch (e) {
/******/ 				if (typeof window === 'object') return window;
/******/ 			}
/******/ 		})();
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/publicPath */
/******/ 	(() => {
/******/ 		var scriptUrl;
/******/ 		if (__webpack_require__.g.importScripts) scriptUrl = __webpack_require__.g.location + "";
/******/ 		var document = __webpack_require__.g.document;
/******/ 		if (!scriptUrl && document) {
/******/ 			if (document.currentScript)
/******/ 				scriptUrl = document.currentScript.src
/******/ 			if (!scriptUrl) {
/******/ 				var scripts = document.getElementsByTagName("script");
/******/ 				if(scripts.length) scriptUrl = scripts[scripts.length - 1].src
/******/ 			}
/******/ 		}
/******/ 		// When supporting browsers where an automatic publicPath is not supported you must specify an output.publicPath manually via configuration
/******/ 		// or pass an empty string ("") and set the __webpack_public_path__ variable from your code to use your own logic.
/******/ 		if (!scriptUrl) throw new Error("Automatic publicPath is not supported in this browser");
/******/ 		scriptUrl = scriptUrl.replace(/#.*$/, "").replace(/\?.*$/, "").replace(/\/[^\/]+$/, "/");
/******/ 		__webpack_require__.p = scriptUrl;
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval devtool is used.
/******/ 	__webpack_require__("./src/js/main.js");
/******/ 	var __webpack_exports__ = __webpack_require__("./src/sass/main.scss");
/******/ 	
/******/ })()
;