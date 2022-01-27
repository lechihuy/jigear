/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./resources/js/admin/store/toast.js ***!
  \*******************************************/
document.addEventListener('alpine:init', function () {
  var TOASTS = {
    danger: {
      theme: 'bg-red-100 text-red-800',
      icon: 'error'
    },
    success: {
      theme: 'bg-green-100 text-green-800',
      icon: 'check_circle'
    }
  };
  Alpine.store('toast', {
    type: null,
    shown: false,
    message: null,
    timer: null,
    show: function show(type, message) {
      var _this = this;

      this.type = type;
      this.message = message;
      this.shown = true;
      this.timer = setTimeout(function () {
        _this.shown = false;
        clearTimeout(_this.timer);
      }, 2000);
    },
    getIconName: function getIconName() {
      return TOASTS[this.type].icon;
    },
    getThemeClass: function getThemeClass() {
      return TOASTS[this.type].theme;
    }
  });
});
/******/ })()
;