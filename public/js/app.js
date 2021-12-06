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
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

throw new Error("Module build failed (from ./node_modules/babel-loader/lib/index.js):\nSyntaxError: /Users/lorenzoorru0/Desktop/team4-proj40/resources/js/app.js: Identifier 'deleteButtons' has already been declared. (18:6)\n\n\u001b[0m \u001b[90m 16 |\u001b[39m })\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 17 |\u001b[39m\u001b[0m\n\u001b[0m\u001b[31m\u001b[1m>\u001b[22m\u001b[39m\u001b[90m 18 |\u001b[39m \u001b[36mconst\u001b[39m deleteButtons \u001b[33m=\u001b[39m document\u001b[33m.\u001b[39mquerySelectorAll(\u001b[32m'.deleteButtonUser'\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m    |\u001b[39m       \u001b[31m\u001b[1m^\u001b[22m\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 19 |\u001b[39m \u001b[36mconst\u001b[39m valueId \u001b[33m=\u001b[39m document\u001b[33m.\u001b[39mgetElementById(\u001b[32m'deleteIdUser'\u001b[39m)\u001b[33m;\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 20 |\u001b[39m\u001b[0m\n\u001b[0m \u001b[90m 21 |\u001b[39m deleteButtons\u001b[33m.\u001b[39mforEach((elm) \u001b[33m=>\u001b[39m {\u001b[0m\n    at Parser._raise (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:541:17)\n    at Parser.raiseWithData (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:534:17)\n    at Parser.raise (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:495:17)\n    at ScopeHandler.checkRedeclarationInScope (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:1688:12)\n    at ScopeHandler.declareName (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:1654:12)\n    at Parser.checkLVal (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:11086:24)\n    at Parser.parseVarId (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:14044:10)\n    at Parser.parseVar (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:14019:12)\n    at Parser.parseVarStatement (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:13836:10)\n    at Parser.parseStatementContent (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:13421:21)\n    at Parser.parseStatement (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:13352:17)\n    at Parser.parseBlockOrModuleBlockBody (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:13941:25)\n    at Parser.parseBlockBody (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:13932:10)\n    at Parser.parseProgram (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:13272:10)\n    at Parser.parseTopLevel (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:13263:25)\n    at Parser.parse (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:15037:10)\n    at parse (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/parser/lib/index.js:15089:38)\n    at parser (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/core/lib/parser/index.js:52:34)\n    at parser.next (<anonymous>)\n    at normalizeFile (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/core/lib/transformation/normalize-file.js:87:38)\n    at normalizeFile.next (<anonymous>)\n    at run (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/core/lib/transformation/index.js:29:50)\n    at run.next (<anonymous>)\n    at Function.transform (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/@babel/core/lib/transform.js:25:41)\n    at transform.next (<anonymous>)\n    at step (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/gensync/index.js:261:32)\n    at /Users/lorenzoorru0/Desktop/team4-proj40/node_modules/gensync/index.js:273:13\n    at async.call.result.err.err (/Users/lorenzoorru0/Desktop/team4-proj40/node_modules/gensync/index.js:223:11)");

/***/ }),

/***/ "./resources/sass/admin.scss":
/*!***********************************!*\
  !*** ./resources/sass/admin.scss ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*****************************************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ./resources/sass/admin.scss ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


__webpack_require__(/*! C:\Users\Mke_8\OneDrive\Desktop\Progetto_Deliveboo\team4-proj40\resources\js\app.js */"./resources/js/app.js");
__webpack_require__(/*! C:\Users\Mke_8\OneDrive\Desktop\Progetto_Deliveboo\team4-proj40\resources\sass\app.scss */"./resources/sass/app.scss");
module.exports = __webpack_require__(/*! C:\Users\Mke_8\OneDrive\Desktop\Progetto_Deliveboo\team4-proj40\resources\sass\admin.scss */"./resources/sass/admin.scss");


/***/ })

/******/ });