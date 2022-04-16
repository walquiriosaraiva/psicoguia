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
/******/ 	return __webpack_require__(__webpack_require__.s = 220);
/******/ })
/************************************************************************/
/******/ ({

/***/ 13:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
class BRMenu {
  constructor(name, component) {
    this.name = name
    this.component = component
    this.id = this.component.id
    this.breakpoints = this.component.dataset.breakpoints
      ? this.component.dataset.breakpoints
      : ['col-sm-4', 'col-lg-3']
    this.pushShadow = 'shadow-lg-right'
    this.trigger = document.querySelector(`[data-target="#${this.id}"]`)
    this.auxiliary = this.component.querySelector('[data-toggle="auxiliary"]')
    this.dismiss = this.component.querySelectorAll('[data-dismiss="menu"]')
    this.scrim = this.component.querySelector('.menu-scrim')
    this.componentFolders = this.component.querySelectorAll('.menu-folder')
    this.componentItems = this.component.querySelectorAll('.menu-item')
    this._setBehavior()
  }

  _setBehavior() {
    this._toggleMenu()
    this._setDropMenu()
    this._setSideMenu()
    this._setKeyboardBehaviors()
    this._setBreakpoints()
    this._setView()
    window.addEventListener('resize', () => {
      this._setView()
    })
  }

  _setView() {
    const template = document.querySelector('body')
    const menuAuxiliar = document.querySelector('.menu-trigger')
    if (menuAuxiliar && window.innerWidth < 575) {
      template.classList.add('mb-5')
    } else {
      template.classList.remove('mb-5')
    }
  }

  _setBreakpoints() {
    if (!this.component.classList.contains('push')) {
      this.component
        .querySelector('.menu-panel')
        .classList.add(...this.breakpoints)
    }
  }

  _setKeyboardBehaviors() {
    // Fechar com tecla ESC
    this.component.addEventListener('keyup', (event) => {
      switch (event.code) {
        case 'Escape':
          this._closeMenu()
        default:
          break
      }
    })
    // Fechar com Tab fora do menu
    if (this.scrim) {
      this.scrim.addEventListener('keyup', () => {
        return this._closeMenu()
      })
    }
  }

  _toggleMenu() {
    const trigger = this.auxiliary ? this.auxiliary : this.trigger
    // Clicar no trigger
    if (trigger) {
      trigger.addEventListener('click', () => {
        // Fechar Menu caso esteja aberto
        if (this.component.classList.contains('active')) {
          this._closeMenu()
          return
        }
        // Abre Menu
        this._openMenu()
        this._focusNextElement()
      })
    }
    // Clicar no dismiss
    for (const close of this.dismiss) {
      close.addEventListener('click', () => {
        return this._closeMenu()
      })
    }
  }

  _openMenu() {
    this.component.classList.add('active')
    if (this.component.classList.contains('push')) {
      this.component.classList.add(...this.breakpoints, 'px-0')
    }
    this.component.focus()
  }

  _closeMenu() {
    this.component.classList.remove('active')
    if (this.component.classList.contains('push')) {
      this.component.classList.remove(...this.breakpoints, 'px-0')
    }
    this._focusNextElement()
  }

  _setDropMenu() {
    // Configura Drop Menu para filho imediato de ".menu-folder"
    for (const item of this.component.querySelectorAll(
      '.menu-folder > a.menu-item'
    )) {
      // Inclui ícone de Drop Menu
      this._createIcon(item, 'fa-angle-down')
      // Configura como Drop Menu
      item.parentNode.classList.add('drop-menu')
      // Inicializa Drop Menu
      this._toggleDropMenu(item)
    }
  }

  _focusNextElement() {
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
        nextElement.focus()
      }
    }
  }

  _setSideMenu() {
    // Configura Side Menu para quem não for filho imediato de ".menu-folder"
    for (const ul of this.component.querySelectorAll('a.menu-item + ul')) {
      if (!ul.parentNode.classList.contains('menu-folder')) {
        // Inclui ícone de Side Menu
        this._createIcon(ul.previousElementSibling, 'fa-angle-right')
        // Configura como Side Menu
        ul.parentNode.classList.add('side-menu')
        // Inicializa Side Menu
        this._toggleSideMenu(ul.previousElementSibling)
      }
    }
  }

  _toggleDropMenu(element) {
    element.addEventListener('click', () => {
      // Fecha Drop Menu caso esteja aberto
      if (element.parentNode.classList.contains('active')) {
        element.parentNode.classList.remove('active')
        return
      }

      // Abre Drop Menu
      element.parentNode.classList.add('active')
    })
  }

  _toggleSideMenu(element) {
    element.addEventListener('click', () => {
      // Esconde todos os itens
      this._hideItems(element)

      // Mostra itens do Side Menu ativo
      this._showItems(element.parentNode)

      // Fecha Side Menu caso esteja aberto
      if (element.parentNode.classList.contains('active')) {
        this._closeSideMenu(element)
        element.focus()
        return
      }

      // Abre Side Menu
      element.parentNode.classList.add('active')
      element.focus()
    })
  }

  _closeSideMenu(element) {
    element.parentNode.classList.remove('active')
    // Verifica se existe Side Menu anterior, caso contrário mostra todos os itens de volta
    const parentFolder = element.parentNode.closest('.side-menu.active')
      ? element.parentNode.closest('.side-menu.active')
      : element.closest('.menu-body')
    this._showItems(parentFolder)
  }

  _hideItems(element) {
    for (const item of element
      .closest('.menu-body')
      .querySelectorAll('.menu-item')) {
      item.setAttribute('hidden', '')
    }
  }

  _showItems(element) {
    for (const item of element.querySelectorAll('.menu-item')) {
      item.removeAttribute('hidden')
    }
  }

  _createIcon(element, icon) {
    const menuIconContainer = document.createElement('span')
    menuIconContainer.classList.add('support')

    const menuIcon = document.createElement('i')
    menuIcon.classList.add('fas')
    menuIcon.classList.add(icon)
    menuIcon.setAttribute('aria-hidden', 'true')

    menuIconContainer.appendChild(menuIcon)
    element.appendChild(menuIconContainer)
  }
}

const menuList = []
for (const brMenu of window.document.querySelectorAll('.br-menu')) {
  menuList.push(new BRMenu('br-menu', brMenu))
}

/* harmony default export */ __webpack_exports__["default"] = (BRMenu);


/***/ }),

/***/ 220:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(13);
__webpack_require__(66);
__webpack_require__(67);
__webpack_require__(221);
__webpack_require__(222);
__webpack_require__(223);
__webpack_require__(224);
module.exports = __webpack_require__(225);


/***/ }),

/***/ 221:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/menu/examples/menu-principal-offcanvas.html");

/***/ }),

/***/ 222:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/menu/examples/menu-principal-push.html");

/***/ }),

/***/ 223:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/menu/examples/menu-auxiliary.html");

/***/ }),

/***/ 224:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/menu/examples/menu-groupedby.html");

/***/ }),

/***/ 225:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/menu/examples/menu-sizes.html");

/***/ }),

/***/ 66:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ 67:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = (__webpack_require__.p + "components/menu/examples.html");

/***/ })

/******/ });
//# sourceMappingURL=menu.js.map