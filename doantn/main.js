const arrbanner = [
] 
const imgBanner = document.getElementsByClassName("banner")
const imgBanner1 = document.getElementsByClassName("banner1")
let j = 0
while (imgBanner[j]) {
    arrbanner.push({
        value: imgBanner1[j].innerText,
        img : imgBanner[j].innerText
    })
    j++;
}

const banner = document.getElementsByClassName("section__banner")[0]
banner.innerHTML = `

    <div class="chevron-left" onclick="chevronLeft()">
        <i class="fas fa-chevron-left"></i>
    </div>
    <img src="anh/${arrbanner[0].img}" alt="${arrbanner[0].value}" onclick="chuyenTrang(event)">
    <div class="chevron-right" onclick="chevronRight()">
        <i class="fas fa-chevron-right"></i>
    </div>
`
var i = 0;
function chevronLeft() {
    const banner = document.getElementsByClassName("section__banner")[0]
    if (i - 1 < 0) {
        i = arrbanner.length - 1
    } else {
        i = i - 1
    }
    banner.innerHTML = `
        <div class="chevron-left" onclick="chevronLeft()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <img src="anh/${arrbanner[i].img}" alt="${arrbanner[i].value}" onclick="chuyenTrang(event)">
        <div class="chevron-right" onclick="chevronRight()">
            <i class="fas fa-chevron-right"></i>
        </div>
    `
}
function chevronRight() {
    const banner = document.getElementsByClassName("section__banner")[0]
    if (i + 1 > arrbanner.length - 1) {
        i = 0
    } else {
        i = i + 1
    }
    banner.innerHTML = `
        <div class="chevron-left" onclick="chevronLeft()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <img src="anh/${arrbanner[i].img}" alt="${arrbanner[i].value}" onclick="chuyenTrang(event)">
        <div class="chevron-right"  onclick="chevronRight()">
            <i class="fas fa-chevron-right"></i>
        </div>
    `
}

function banners () {
    i++;
    const banner = document.getElementsByClassName("section__banner")[0]
    banner.innerHTML = `
        <div class="chevron-left" onclick="chevronLeft()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <img src="anh/${arrbanner[0].img}" alt="${arrbanner[0].value}" onclick="chuyenTrang(event)">
        <div class="chevron-right" onclick="chevronRight()">
            <i class="fas fa-chevron-right"></i>
        </div>
    `
    if (i > arrbanner.length -1) {
        i = 0
    }

    let html = `
        <div class="chevron-left" onclick="chevronLeft()">
            <i class="fas fa-chevron-left"></i>
        </div>
        <img src="anh/${arrbanner[i].img}" alt="${arrbanner[i].value}" onclick="chuyenTrang(event)">
        <div class="chevron-right" onclick="chevronRight()">
            <i class="fas fa-chevron-right"></i>
        </div>
    `

    banner.innerHTML = html
}

function chuyenTrang(event) {
    window.open(`timkiem.php?value=${event.target.alt}`,'_self','',true);
}

var myVar = setInterval(banners,5000)
var id = 0
function page_scroll2top(){
    const html = document.querySelector('html')
    clearInterval(id)
    id = setInterval(animation, 1)
    function animation() {
        if (html.scrollTop <= 0){
            clearInterval(id)
        } else {
            html.scrollTop -= 20
        }
    }
}

window.addEventListener('scroll', function () {
    const html = document.querySelector('html')
    const buttonScroll = document.getElementsByClassName('button_scroll2top')[0]
    if (html.scrollTop >= 300){
        buttonScroll.style.display = 'block'
    } else {
        buttonScroll.style.display = 'none'
    }
})

function openMenu() {
    const headerMenu = document.getElementsByClassName("header__menu")[0]
    headerMenu.style.display = "flex"
}
const closeMenu = document.getElementsByClassName("close")[0]
closeMenu.addEventListener('click',function () {
    const headerMenu = document.getElementsByClassName("header__menu")[0]
    headerMenu.style.display = "none"
})
