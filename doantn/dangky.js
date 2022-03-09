function validateUsername(){
    const nameRegex = /^[a-zA-Z0-9]{0,65}$/g;
    const checkUsername = document.getElementsByClassName("checkusername")[0]

    const username = document.getElementsByName("username")[0].value
    const dangky = document.getElementById("btndangky")

    if(nameRegex.test(username)){
        checkUsername.style.display = "none"
        dangky.name = "dangky"
    } else {
        checkUsername.innerHTML = "Tên đăng nhập chỉ được nhập ký tự A-Z, a-z and 0-9, tối đa 65 kí tự"
        checkUsername.style.display = "block"
        dangky.name = "dangky1"
    }
    if (!(username)){
        checkUsername.innerHTML = "Không được bỏ trống tên đăng nhập"
        checkUsername.style.display = "block"
    } else if(username == "") {
        checkUsername.innerHTML = "Không được bỏ trống tên đăng nhập"
        checkUsername.style.display = "block"
    }
}

const dangky = document.getElementById("btndangky")

dangky.addEventListener('click', function () {
    const loi = document.getElementById("loi")
    if (dangky.name == "dangky1"){
        loi.style.display = "block"
    } else {
        loi.style.display = "none"
    }
})

function  validateSDT() {
    const sdtRegex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    const checkSDT = document.getElementsByClassName("checksdt")[0]

    const sdt = document.getElementsByName("sdt")[0].value

    if(sdtRegex.test(sdt)){
        checkSDT.style.display = "none"
    } else {
        checkSDT.innerHTML = "số diện thoại không hợ lệ"
        checkSDT.style.display = "block"
        document.getElementsByName("sdt")[0].value = ""
    }
    if (!(sdt)){
        checkSDT.innerHTML = "Không được bỏ trống số điện thoại"
        checkSDT.style.display = "block"
    } else if(sdt == "") {
        checkSDT.innerHTML = "Không được bỏ trống số điện thoại"
        checkSDT.style.display = "block"
    }
}

function  CheckMK() {
    const checkMK = document.getElementsByClassName("checkmk")[0]

    const password = document.getElementsByName("password")[0].value
    if(password.length > 65){
        checkMK.style.display = "block"
        checkMK.innerHTML = "password không quá 65 kí tự"
        document.getElementsByName("password")[0].value = ""
    } else {
        checkMK.style.display = "none"
    }
}