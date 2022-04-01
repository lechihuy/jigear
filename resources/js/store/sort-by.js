document.addEventListener('alpine:init', () => {
    Alpine.store('sortBy', {

        openSortBy: false,
        toggleSortBy() {
            this.openSortBy = !this.openSortBy
        }
        
    })
})