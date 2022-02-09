/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!****************************************************!*\
  !*** ./resources/js/admin/pages/catalog/create.js ***!
  \****************************************************/
document.addEventListener('alpine:init', function () {
  Alpine.data('createCatalogForm', function () {
    return {
      title: '',
      parent_id: '',
      loading: false,
      submit: function submit() {
        var _this = this;

        this.loading = true;
        axios.post(route('admin.catalogs.store'), {
          title: this.title,
          parent_id: this.parent_id
        }).then(function (res) {
          window.location.href = route('admin.catalogs.show', {
            catalog: res.data.catalog.id
          });
        })["catch"](function (err) {
          Alpine.store('toast').show('danger', err.response.data.message);
        })["finally"](function () {
          _this.loading = false;
        });
      }
    };
  });
});
/******/ })()
;