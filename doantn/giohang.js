function huyDH(event) {
    const thongTinSanPham = event.target.parentNode.parentNode
    const thongBao = thongTinSanPham.querySelector(".thongbao")
    const trangthai = thongTinSanPham.querySelector(".trangthai")
    if (trangthai.innerHTML == "Chờ duyệt"){
        thongBao.style.display = "block"
    } else {
        alert("sản phẩm ở trạng thái đang giao hàng không thể huỷ")
    }
}

function huyYeuCau(event) {
    const thongBao = event.target.parentNode
    thongBao.style.display = "none"
}