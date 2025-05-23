// Dữ liệu sản phẩm
var arrSP = [
    { tenSP: 'Detox clear', hinh: 'images/detoxclean1.png', gia: 1250000,link: "http://127.0.0.1:5500/Nhom3_PHP-main/detoxclear.html" },
    { tenSP: 'Mixdetix S13 2', hinh: 'images/mixdetoxS132.png', gia: 2558000, link: "" },
    { tenSP: 'Mixdetix S13 3', hinh: 'images/mixdetoxS133.png', gia: 2558000, link: "" },
    { tenSP: 'Mixdetix S13 4', hinh: 'images/anh9.png', gia: 1050000, link: "" },
    { tenSP: 'Mixdetix S13 5', hinh: 'images/anh12.png', gia: 990000, link: "" },
    { tenSP: 'Detox Clean 1', hinh: 'images/detoxclean1.png', gia: 1725000, link: "" },
    { tenSP: 'Detox Clean 2', hinh: 'images/detoxclean2.png', gia: 1125000, link: "" },
    { tenSP: 'Detox Clean 3', hinh: 'images/detoxclean3.png', gia: 1580000, link: "" },
    
];

// Biến toàn cục lưu danh sách sản phẩm
var productList;

// Khi DOM đã sẵn sàng, gán biến productList và hiển thị tất cả sản phẩm
document.addEventListener("DOMContentLoaded", function () {
    productList = document.getElementById("product-list");
    console.log("Danh sách sản phẩm:", productList);

    hienSP(arrSP, []); // Hiển thị tất cả sản phẩm ban đầu
});

function hienSP(products, giaban_arr) {
    productList.innerHTML = ''; // Xóa nội dung cũ
    console.log("Hiển thị sản phẩm với các điều kiện lọc:", giaban_arr);

    let hasProduct = false; // Biến kiểm tra xem có sản phẩm nào phù hợp hay không

    products.forEach(sp => {
        const giaDT = sp.gia;

        // Kiểm tra điều kiện lọc giá
        if (giaban_arr.length > 0) {
            if (giaDT < 500000 && !giaban_arr.includes('1')) return;
            if (giaDT >= 500000 && giaDT < 1000000 && !giaban_arr.includes('2')) return;
            if (giaDT >= 1000000 && giaDT < 1500000 && !giaban_arr.includes('3')) return;
            if (giaDT >= 1500000 && !giaban_arr.includes('4')) return;
        }

        // Nếu sản phẩm phù hợp, thêm vào danh sách
        productList.innerHTML += `
        <div class="product" data-price="${sp.gia}">
            <a href="${sp.link ? sp.link : '#'}"> <!-- Thêm liên kết sản phẩm -->
                <img src="${sp.hinh}" alt="${sp.tenSP}" class="product-image">
                <p class="product-name">${sp.tenSP}</p>
                <p class="product-price">${sp.gia.toLocaleString()}₫</p>
            </a>
        </div>
    `;
        hasProduct = true; // Có ít nhất 1 sản phẩm phù hợp
    });

    // Nếu không có sản phẩm phù hợp, hiển thị thông báo
    if (!hasProduct) {
        productList.innerHTML = `
            <p style="text-align: center; font-size: 18px; color: red;">
                Không tìm thấy sản phẩm phù hợp
            </p>
        `;
        console.log("Không có sản phẩm phù hợp!");
    }
}


// Hàm lọc sản phẩm dựa trên giá
function chonSP() {
    const filters = document.getElementsByClassName("filter-price");
    const giaban_arr = [];
    for (let i = 0; i < filters.length; i++) {
        if (filters[i].checked) {
            giaban_arr.push(filters[i].value);
        }
    }
    console.log("Checkbox đã chọn:", giaban_arr);
    hienSP(arrSP, giaban_arr);
}
