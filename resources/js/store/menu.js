document.addEventListener('alpine:init', () => {
    Alpine.store('menu', {
        open: false,
        
        toggle() {
            this.open = !this.open
        }
    })
})