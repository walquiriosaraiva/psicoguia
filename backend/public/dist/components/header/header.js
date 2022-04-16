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
/******/ 	return __webpack_require__(__webpack_require__.s = 181);
/******/ })
/************************************************************************/
/******/ ({

/***/ 11:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class BRHeader {
  constructor(name, component) {
    this.name = name
    this.component = component
    this.componentSearch = this.component.querySelector('.header-search')
    this.componentSearchInput = this.component.querySelector(
      '.header-search input'
    )
    this.componentSearchTrigger = this.component.querySelector(
      '[data-toggle="search"]'
    )
    this.componentSearchDismiss = this.component.querySelector(
      '[data-dismiss="search"]'
    )
    this.hideDrop = null
    this.menuTrigger = this.component.querySelector(
      '[data-target="#main-navigation"]'
    )
    this._setBehavior()
  }

  _setBehavior() {
    this._setLoginBehavior()
    this._setLogoutBehavior()
    this._setSearchBehaviors()
    this._setKeyboardBehaviors()
    this._setDropdownBehavior()
    this._setSticky()
  }

  _setLoginBehavior() {
    for (const login of this.component.querySelectorAll(
      '[data-trigger="login"]'
    )) {
      login.addEventListener('click', () => {
        const loginParent = login.closest('.header-login')
        loginParent.querySelector('.header-sign-in').classList.add('d-none')
        loginParent.querySelector('.header-avatar').classList.remove('d-none')
      })
    }
  }

  _setLogoutBehavior() {
    for (const logout of this.component.querySelectorAll(
      '[data-trigger="logout"]'
    )) {
      logout.addEventListener('click', () => {
        const logoutParent = logout.closest('.header-login')
        logoutParent.querySelector('.avatar').classList.remove('show')
        logoutParent
          .querySelector('[data-toggle="dropdown"]')
          .classList.remove('active')
        logoutParent.querySelector('.header-sign-in').classList.remove('d-none')
        logoutParent.querySelector('.header-avatar').classList.add('d-none')
      })
    }
  }

  _setSearchBehaviors() {
    // Abrir busca
    if (this.componentSearchTrigger) {
      this.componentSearchTrigger.addEventListener('focus', () => {
        this._cleanDropDownHeader()
      })
      this.componentSearchTrigger.addEventListener('click', () => {
        this._openSearch()
      })
    }

    // Fechar busca
    if (this.componentSearchDismiss) {
      this.componentSearchDismiss.addEventListener('click', () => {
        this._closeSearch()
      })
    }
  }

  _setKeyboardBehaviors() {
    if (this.componentSearchInput) {
      this.componentSearchInput.addEventListener('keydown', (event) => {
        switch (event.keyCode) {
          // Tecla ESC
          case 27:
            this._closeSearch()
            break
          default:
            break
        }
      })
    }
    for (const trigger of this.component.querySelectorAll(
      '.dropdown [data-toggle="dropdown"]'
    )) {
      trigger.addEventListener('keydown', (event) => {
        switch (event.keyCode) {
          // Tecla ESC
          case 32:
            if (event.target.parentNode.classList.contains('show')) {
              event.target.parentNode.click()
              event.target.parentNode.classList.remove('show')
              event.target.classList.remove('active')
              event.stopPropagation()
            }
            break
          default:
            break
        }
      })
    }
  }
  _openSearch() {
    if (this.componentSearch) {
      this.componentSearch.classList.add('active')
      this.componentSearch.querySelector('input').focus()
    }
  }

  _closeSearch() {
    if (this.componentSearch) {
      this.componentSearch.classList.remove('active')
      //this.componentSearchTrigger.focus()
      this._nextFocusElement().focus()
    }
  }

  _setDropdownBehavior() {
    let hideDrop
    for (const trigger of this.component.querySelectorAll(
      '.dropdown [data-toggle="dropdown"]'
    )) {
      trigger.addEventListener('click', (event) => {
        clearTimeout(hideDrop)

        // Toggle de abrir / fechar
        const hasShow = event.target.parentNode.classList.contains('active')
        if (hasShow) {
          event.target.parentNode.classList.remove('active')
          event.target.parentNode.parentNode.classList.remove('show')
        } else {
          this._cleanDropDownHeader()
          trigger.classList.add('active')
          trigger.parentNode.classList.add('show')

          // Evita que o componente feche o drop ao navegar pelo teclado
          const next = this._nextFocusElement()
          next.addEventListener('focus', (event) => {
            clearTimeout(hideDrop)
          })
        }
        event.stopPropagation()
      })

      // Faz o drop fechar ao clicar fora
      trigger.addEventListener('blur', (event) => {
        hideDrop = setTimeout(this._cleanDropDownHeaderRef, 500, this.component)
      })
    }
    this.menuTrigger.addEventListener('focus', (event) => {
      this._cleanDropDownHeader()
    })
  }

  _cleanDropDownHeaderRef(ref) {
    for (const trigger of ref.querySelectorAll('.dropdown.show')) {
      trigger.classList.remove('show')
      trigger.parentNode.classList.remove('show')
      for (const button of ref.querySelectorAll('.br-button')) {
        button.classList.remove('active')
      }
    }
  }

  _cleanDropDownHeader() {
    this._cleanDropDownHeaderRef(this.component)
  }

  _setSticky() {
    if (this.component.hasAttribute('data-sticky')) {
      window.onscroll = () => {
        if (window.pageYOffset > this.component.offsetHeight) {
          this.component.classList.add('sticky', 'compact')
        } else {
          this.component.classList.remove('sticky', 'compact')
        }
      }
    }
  }

  _nextFocusElement() {
    //add all elements we want to include in our selection
    const focussableElements =
      'a:not([disabled]), button:not([disabled]), input[type=text]:not([disabled]), [tabindex]:not([disabled]):not([tabindex="-1"])'
    if (document.activeElement) {
      const focussable = Array.prototype.filter.call(
        document.body.querySelectorAll(focussableElements),
        (element) => {
          //check for visibility while always include the current activeElement
          return (
            element.offsetWidth > 0 ||
            element.offsetHeight > 0 ||
            element === document.activeElement
          )
        }
      )
      const index = focussable.indexOf(document.activeElement)
      if (index > -1) {
        const nextElement = focussable[index + 1] || focussable[0]
        //nextElement.focus();
        return nextElement
      }
    }
    return null
  }
}

const headerList = []
for (const brHeader of window.document.querySelectorAll('.br-header')) {
  headerList.push(new BRHeader('br-header', brHeader))
}

/* harmony default export */ __webpack_exports__["default"] = (BRHeader);


/***/ }),

/***/ 181:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(11);
__webpack_require__(56);
__webpack_require__(57);
__webpack_require__(182);
__webpack_require__(183);
module.exports = __webpack_require__(184);


/***/ }),

/***/ 182:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/header/examples/header-compact.html");

/***/ }),

/***/ 183:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/header/examples/header-sizes.html");

/***/ }),

/***/ 184:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/header/examples/header.html");

/***/ }),

/***/ 56:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ 57:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/header/examples.html");

/***/ })

/******/ });
//# sourceMappingURL=header.js.map