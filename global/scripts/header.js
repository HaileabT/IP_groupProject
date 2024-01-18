function fixedHeaderController() {

    if (window.matchMedia('(hover:hover)').matches){
        const fixedHeader = document.querySelector('.fixed-header')
        window.addEventListener('scroll', controlHeader, { passive: true })

        function controlHeader(e) {
            if (window.scrollY < 100){
                fixedHeader.style.top = '1em'
                return
            }
            if (window.scrollY > 100){
                fixedHeader.style.top = '-8em'
                return
            }
        }
    }

}

fixedHeaderController()