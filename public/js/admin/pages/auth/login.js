/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************************!*\
  !*** ./resources/js/admin/pages/auth/login.js ***!
  \************************************************/
document.addEventListener('alpine:init', function () {
  Alpine.data('loginForm', function () {
    return {
      email: '',
      password: '',
      remember: false,
      loading: false,
      submit: function submit() {
        var _this = this;

        this.loading = true;
        axios.post(route('admin.auth.login.store'), {
          email: this.email,
          password: this.password,
          remember: this.remember
        }).then(function (res) {
          window.location.href = route('admin.dashboard');
        })["catch"](function (err) {
          var message;

          switch (err.response.status) {
            case 422:
              message = err.response.data.errors[Object.keys(err.response.data.errors)[0]][0];
              break;

            default:
              message = err.response.data.message;
              break;
          }

          Alpine.store('toast').show('danger', message);
        })["finally"](function () {
          _this.loading = false;
        });
      }
    };
  });
});
/******/ })()
;