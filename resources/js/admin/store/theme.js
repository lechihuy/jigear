document.addEventListener('alpine:init', () => {
  Alpine.store('theme', {
    width: 0,
    height: 0,
    shownSidebar: false,

    init() {
      this.update();
    },

    toggleSidebar() {
      this.shownSidebar = !this.shownSidebar
    },

    update() {
      this.width = window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;
      this.height = window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;
      this.shownSidebar = this.width >= 1024;
    }
  });
});

window.addEventListener('resize', () => {
  Alpine.store('theme').update();
});
