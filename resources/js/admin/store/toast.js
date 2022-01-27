document.addEventListener('alpine:init', () => {
  const TOASTS = {
    danger: {
      theme: 'bg-red-100 text-red-800',
      icon: 'error'
    },
    success: {
      theme: 'bg-green-100 text-green-800',
      icon: 'check_circle'
    }
  }

  Alpine.store('toast', {
    type: null,
    shown: false,
    message: null,
    timer: null,

    show(type, message) {
      this.type = type
      this.message = message
      this.shown = true

      this.timer = setTimeout(() => {
        this.shown = false
        clearTimeout(this.timer)
      }, 2000)
    },

    getIconName() {
      return TOASTS[this.type].icon
    },

    getThemeClass() {
      return TOASTS[this.type].theme
    }
  })
})