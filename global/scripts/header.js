const menuBtn = document.querySelector('.menu-btn')
const primaryNav = document.getElementById('primary-nav')
const fixedHeader = document.querySelector('.fixed-header')
const menuClickHandler = (e) => {
    console.log(e.currentTarget)
    primaryNav.classList.toggle('show')
    fixedHeader.classList.toggle('show')
}
menuBtn.addEventListener('click', menuClickHandler, true)
function fixedHeaderController() {

    if (window.matchMedia('(hover:hover)').matches){
        window.addEventListener('scroll', controlHeader, { passive: true })

        function controlHeader(e) {
            if (window.scrollY < 100){
                primaryNav.classList.remove('show')
                fixedHeader.classList.remove('show')
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