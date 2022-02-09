document.addEventListener('alpine:init', () => {
  Alpine.data('loginForm', () => ({
    email: '',
    password: '',
    remember: false,
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('admin.auth.login.store'), {
        email: this.email,
        password: this.password,
        remember: this.remember
      }).then(res => {
        window.location.href = route('admin.dashboard');
      }).catch(err => {
        Alpine.store('toast').show('danger', err.response.data.message)
      }).finally(() => {
        this.loading = false;
      })
    }
  }));
});