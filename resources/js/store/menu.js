document.addEventListener('alpine:init', () => {
    Alpine.store('menu', {
        open: false,
        toggle() {
            this.open = !this.open
        },

        openBag: false,
        toggleBag() {
            this.openBag = !this.openBag
        },

        openSortBy: false,
        toggleSortBy() {
            this.openSortBy = !this.openSortBy
        }
    })
})

