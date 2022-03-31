document.addEventListener('alpine:init', () => {
    Alpine.store('filterProduct', {

        openItem: false,
        toggleOpenItem() {
            this.openItem = !this.openItem
        }
        
    })
})