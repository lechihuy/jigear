document.addEventListener('alpine:init', () => {
    Alpine.store('dropDown', {
        open: false,
        
        toggle() {
            this.on = !this.on
        }
    })
})