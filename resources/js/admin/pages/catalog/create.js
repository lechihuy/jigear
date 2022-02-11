document.addEventListener('alpine:init', () => {
  Alpine.data('createCatalogForm', () => ({
    title: '',
    parent_id: '',
    loading: false,
    submit() {
      this.loading = true;

      axios.post(route('admin.catalogs.store'), {
        title: this.title,
        parent_id: this.parent_id
      }).then(res => {
        window.location.href = route('admin.catalogs.show', { catalog: res.data.catalog.id });
      }).catch(err => {
        Alpine.store('toast').show('danger', err.response.data.message)
      }).finally(() => {
        this.loading = false;
      })
    }
  }));
});