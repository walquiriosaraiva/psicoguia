/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 155);
/******/ })
/************************************************************************/
/******/ ({

/***/ 155:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(9);
__webpack_require__(46);
__webpack_require__(47);
__webpack_require__(156);
__webpack_require__(157);
__webpack_require__(158);
__webpack_require__(159);
module.exports = __webpack_require__(160);


/***/ }),

/***/ 156:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/checkbox/examples/checkbox-indeterminate.html");

/***/ }),

/***/ 157:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/checkbox/examples/checkbox-no-label.html");

/***/ }),

/***/ 158:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/checkbox/examples/checkbox-estados-validacao.html");

/***/ }),

/***/ 159:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/checkbox/examples/checkbox-horizontal.html");

/***/ }),

/***/ 160:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/checkbox/examples/checkbox-padrao.html");

/***/ }),

/***/ 46:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ 47:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/checkbox/examples.html");

/***/ }),

/***/ 9:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class BRCheckbox {
  constructor(name, component) {
    this.name = name
    this.component = component
    this._setBehavior()
  }

  _setBehavior() {
    // this._setIndeterminatedBehavior()
    this._setMasterBehavior()
    this._setChildBehavior()
  }

  _setMasterBehavior() {
    this.component.querySelectorAll('input[data-master]').forEach((master) => {
      master.addEventListener('click', () => {
        if (master.hasAttribute('indeterminate')) {
          master.checked = true
          this.component.querySelectorAll('label').forEach((label) => {
            label.innerHTML = 'Desselecionar tudo'
          })
          master.removeAttribute('indeterminate')
        }
        document
          .querySelectorAll(
            `.br-checkbox input[data-child="${master.getAttribute(
              'data-master'
            )}"]`
          )
          .forEach((child) => {
            if (master.checked) {
              master.nextElementSibling.innerHTML = 'Desselecionar tudo'
              if (!child.checked) {
                child.checked = true
              }
            } else {
              master.nextElementSibling.innerHTML = 'Selecionar tudo'
              if (child.checked) {
                child.checked = false
              }
            }
          })
      })
    })
  }

  _setChildBehavior() {
    this.component.querySelectorAll('input[data-child]').forEach((child) => {
      child.addEventListener('click', () => {
        if (this._isAllChildChecked(child.getAttribute('data-child'))) {
          document
            .querySelectorAll(
              `.br-checkbox input[data-master="${child.getAttribute(
                'data-child'
              )}"]`
            )
            .forEach((master) => {
              master.checked = true
              master.nextElementSibling.innerHTML = 'Desselecionar tudo'
              master.removeAttribute('indeterminate')
            })
        } else if (
          this._isAllChildUnchecked(child.getAttribute('data-child'))
        ) {
          document
            .querySelectorAll(
              `.br-checkbox input[data-master="${child.getAttribute(
                'data-child'
              )}"]`
            )
            .forEach((master) => {
              master.checked = false
              master.nextElementSibling.innerHTML = 'Selecionar tudo'
              master.removeAttribute('indeterminate')
            })
        } else {
          document
            .querySelectorAll(
              `.br-checkbox input[data-master="${child.getAttribute(
                'data-child'
              )}"]`
            )
            .forEach((master) => {
              master.checked = true
              master.nextElementSibling.innerHTML = 'Selecionar tudo'
              master.setAttribute('indeterminate', '')
            })
        }
      })
    })
  }

  _isAllChildChecked(childName) {
    let allChecked = true
    document
      .querySelectorAll(`.br-checkbox input[data-child="${childName}"]`)
      .forEach((child) => {
        if (!child.checked) {
          allChecked = false
        }
      })
    return allChecked
  }

  _isAllChildUnchecked(childName) {
    let allUnchecked = true
    document
      .querySelectorAll(`.br-checkbox input[data-child="${childName}"]`)
      .forEach((child) => {
        if (child.checked) {
          allUnchecked = false
        }
      })
    return allUnchecked
  }
}

const checkboxList = []
for (const brCheckbox of window.document.querySelectorAll('.br-checkbox')) {
  checkboxList.push(new BRCheckbox('br-checkbox', brCheckbox))
}

/* harmony default export */ __webpack_exports__["default"] = (BRCheckbox);


/***/ })

/******/ });
//# sourceMappingURL=checkbox.js.map