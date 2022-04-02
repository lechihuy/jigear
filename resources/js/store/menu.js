document.addEventListener('alpine:init', () => {
    Alpine.store('menu', {
        open: false,
        toggle() {
            this.open = !this.open
        },

        openBag: false,
        toggleBag() {
            this.openBag = !this.openBag
            this.openSearch = false
        },

        openSortBy: false,
        toggleSortBy() {
            this.openSortBy = !this.openSortBy
        },

        openSearch: false,
        toggleSearch() {
            this.openSearch = !this.openSearch
            this.openBag = false
        }
    })
})



