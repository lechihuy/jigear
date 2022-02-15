document.addEventListener('alpine:init', () => {
  Alpine.store('confirmModal', {
    shown: false,
    url: null,
    redirect: null,
    method: null,
    data: null,
    loading: false,

    show(method, url, redirect = null) {
      this.method = method
      this.url = url
      this.redirect = redirect
      this.shown = true
    },

    confirm() {
      this.loading = true;

      axios({
        method: this.method,
        url: this.url,
        data: this.data
      }).then(res => {
        window.location.href = this.redirect ?? route('admin.dashboard');
      }).catch(err => {
        this.hide()
        Alpine.store('toast').show('danger', err.response.data.message)
      }).finally(() => {
        this.loading = false;
      })
    },

    hide() {
      this.shown = false
    }
  })
})