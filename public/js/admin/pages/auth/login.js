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
        this.loading = true; // axios.post(route('bit.login.store'), {
        //   email: this.email,
        //   password: this.password,
        //   remember: this.remember
        // }).then(res => {
        //   Turbolinks.visit(route('bit.dashboard'), { action: 'replace' })
        //   document.addEventListener('alpine:init', () => Alpine.store('toast').show('success', 'Đăng nhập thành công'))
        // }).catch(err => {
        //   let message
        //   switch (err.response.status) {
        //     case 422:
        //       message = err.response.data.errors[Object.keys(err.response.data.errors)[0]][0]
        //       break
        //     default:
        //       message = err.response.data.message
        //       break
        //   }
        //   Alpine.store('toast').show('danger', message)
        // }).finally(() => {
        //   this.loading = false;
        // })
      }
    };
  });
});
/******/ })()
;