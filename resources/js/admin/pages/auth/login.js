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
        let message

        switch (err.response.status) {
          case 422:
            message = err.response.data.errors[Object.keys(err.response.data.errors)[0]][0]
            break
          default:
            message = err.response.data.message
            break
        }

        Alpine.store('toast').show('danger', message)
      }).finally(() => {
        this.loading = false;
      })
    }
  }));
});