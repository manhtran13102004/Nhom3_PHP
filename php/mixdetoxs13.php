<?php
require_once '../csdl/connect.php'; // Kết nối CSDL

// Lấy sản phẩm theo tên
$sql = "SELECT * FROM sanpham WHERE ten = 'Mix Detox S13' LIMIT 1";
$result = $conn->query($sql);
$sp = $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;

// Lấy ảnh sản phẩm từ bảng sanpham_images
// Giả sử $sp['ten'] = 'detox3ngay'
// Lấy ảnh từ bảng sanpham_images (cột sanphamID là chuỗi 'detox3ngay')
if ($sp) {
    // Sử dụng đúng id sản phẩm thay vì chuẩn hóa tên
    $sanphamID = $sp['ID']; // cột ID trong bảng sanpham là 'mixdetox'
    $img_sql = "SELECT imagePath FROM sanpham_images WHERE sanphamID = '$sanphamID'";
    $img_result = $conn->query($img_sql);
    if ($img_result && $img_result->num_rows > 0) {
        while ($row = $img_result->fetch_assoc()) {
            $images[] = '../images/' . $row['imagePath'];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mix Detox S13</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/header.css"> 
    <link rel="stylesheet" href="../css/sp1.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="../css/bookmark&brand.css">
    <link rel="stylesheet" href="../css/root.css">
    <link rel="icon" href="../images/logo.png" type = "image/x-icon">
    <link rel="icon" href="../images/logo.png" type = "image/x-icon"> <!--FAVICON-->
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/header.css">
    <link rel="stylesheet" href="../css/cantay.css">
</head>
<!-- Chat Box -->
<div class="chatbox-container">
    <div class="chatbox-header">
        <h5>Fit&Fresh</h5>
        <button class="chatbox-close" onclick="toggleChatBox()">×</button>
    </div>
    <div class="chatbox-body">
        <p>Bắt đầu trò chuyện nhanh với <b>Fit&Fresh</b>. Giai đáp mọi thắc mắc của quý khách hàng.</p>
        <div id="chatMessages"></div> <!--hiển thị nội dung đã nhập tin nhắn-->
        <div class="chatbox-input">
            <input type="text" id="chatInput" placeholder="Nhập tin nhắn..."> 
            <button id="sendButton" onclick="sendMessage()">Gửi</button>
        </div>
    </div>
</div>
<button id="chatboxToggle" onclick="toggleChatBox()">Tư vấn</button>
<body>
    <header>
        <div id="header">
            <div class="top-bar">
                <div class="contact-info">
                    <ul>
                        <li id="place">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="10.5"
                                viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#020024"
                                    d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
                            </svg>
                            Hà Nội - Việt Nam
                        </li>
                        <li id="emailcontact">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#020024"
                                    d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                            </svg>
                            <a href="mailto:morrifarm@gmail.com" class="contact">fit&fresh@gmail.com</a>
                        </li>
                        <li id="phonenumber">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#020024"
                                    d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                            </svg>
                            <a href="tel:0927543137" class="contact">0986868686</a>
                        </li>
                        <!--Nút tìm kiếm-->
                        <li class="search">
                            <input id="search-input" placeholder="Tìm kiếm sản phẩm ..." type="search">
                            <icon id="search-button">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20"
                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#020024"
                                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                                </svg>
                            </icon>
                        </li>
                        <li id="account">
                            <svg fill="#020024" height="30px" width="30px" version="1.1" id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 402.161 402.161" xml:space="preserve" stroke="#020024">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <g>
                                        <g>
                                            <g>
                                                <path
                                                    d="M201.08,49.778c-38.794,0-70.355,31.561-70.355,70.355c0,18.828,7.425,40.193,19.862,57.151 c14.067,19.181,32,29.745,50.493,29.745c18.494,0,36.426-10.563,50.494-29.745c12.437-16.958,19.862-38.323,19.862-57.151 C271.436,81.339,239.874,49.778,201.08,49.778z M201.08,192.029c-13.396,0-27.391-8.607-38.397-23.616 c-10.46-14.262-16.958-32.762-16.958-48.28c0-30.523,24.832-55.355,55.355-55.355s55.355,24.832,55.355,55.355 C256.436,151.824,230.372,192.029,201.08,192.029z">
                                                </path>
                                                <path
                                                    d="M201.08,0C109.387,0,34.788,74.598,34.788,166.292c0,91.693,74.598,166.292,166.292,166.292 s166.292-74.598,166.292-166.292C367.372,74.598,292.773,0,201.08,0z M201.08,317.584c-30.099-0.001-58.171-8.839-81.763-24.052 c0.82-22.969,11.218-44.503,28.824-59.454c6.996-5.941,17.212-6.59,25.422-1.615c8.868,5.374,18.127,8.099,27.52,8.099 c9.391,0,18.647-2.724,27.511-8.095c8.201-4.97,18.39-4.345,25.353,1.555c17.619,14.93,28.076,36.526,28.895,59.512 C259.25,308.746,231.178,317.584,201.08,317.584z M296.981,283.218c-3.239-23.483-15.011-45.111-33.337-60.64 c-11.89-10.074-29.1-11.256-42.824-2.939c-12.974,7.861-26.506,7.86-39.483-0.004c-13.74-8.327-30.981-7.116-42.906,3.01 c-18.31,15.549-30.035,37.115-33.265,60.563c-33.789-27.77-55.378-69.868-55.378-116.915C49.788,82.869,117.658,15,201.08,15 c83.423,0,151.292,67.869,151.292,151.292C352.372,213.345,330.778,255.448,296.981,283.218z">
                                                </path>
                                                <path
                                                    d="M302.806,352.372H99.354c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h203.452c4.142,0,7.5-3.358,7.5-7.5 C310.307,355.73,306.948,352.372,302.806,352.372z">
                                                </path>
                                                <path
                                                    d="M302.806,387.161H99.354c-4.142,0-7.5,3.358-7.5,7.5c0,4.142,3.358,7.5,7.5,7.5h203.452c4.142,0,7.5-3.358,7.5-7.5 C310.307,390.519,306.948,387.161,302.806,387.161z">
                                                </path>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                            <a href="../dangnhap.html" class="contact">Đăng nhập</a>

                        </li>
                        <li id="cart">
                            <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14"
                                viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#020024"
                                    d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z" />
                            </svg>
                            <a href="../src/giohang.html" class="contact">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div id="main-header">
                <div class="main-header-container">
                    <a href="../index.html" class="img-header">
                        <img src="../images/logo.png" alt="logo" >
                    </a>
                    <ul id="main-menu">
                        <li><a href="../index.html">Trang Chủ</a></li>
                        <li><a href="../gioithieu.html">Giới thiệu</a></li>
                        <li><a href="../dichvu.html">Dịch Vụ</a></li>
                        <li><a href="../sanpham.html">Sản Phẩm</a>
                            <ul class="sp-menu">
                                <li><a href="rauanqua.html">Thanh lọc cơ bản</a></li>
                                <li><a href="rauancu.html">Thanh lọc-Giảm cân-Giảm mỡ</a></li>
                                <li><a href="rauanla.html">Thanh lọc chuyên sâu</a></li>
                                <li><a href="rauanla.html">Juice and Smoothie</a></li>
                            </ul>
                        </li>
                        <li><a href="../tintuc.html">Tin Tức</a></li>
                        <li><a href="../lienhe.html">Liên Hệ</a></li>
                    </ul>

                    <label for="nav-mobile-input" class="navbar-button">
                        <svg xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
                        </svg>
                        <input type="checkbox" name="" class="nav__input" id="nav-mobile-input">
                        <label for="nav-mobile-input" class="nav__overlay"></label>
                        <ul id="main-menu__mobile">
                            <label for="nav-mobile-input" class="nav-close__mobile">
                                <svg xmlns="http://www.w3.org/2000/svg" height="15" width="15"
                                    viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#7dc642"
                                        d="M376.6 84.5c11.3-13.6 9.5-33.8-4.1-45.1s-33.8-9.5-45.1 4.1L192 206 56.6 43.5C45.3 29.9 25.1 28.1 11.5 39.4S-3.9 70.9 7.4 84.5L150.3 256 7.4 427.5c-11.3 13.6-9.5 33.8 4.1 45.1s33.8 9.5 45.1-4.1L192 306 327.4 468.5c11.3 13.6 31.5 15.4 45.1 4.1s15.4-31.5 4.1-45.1L233.7 256 376.6 84.5z" />
                                </svg>
                            </label><br> <br> <br>
                            <li><a href="../index.html" class="nav-mobile">TRANG CHỦ</a></li>
                            <li><a href="../gioithieu.html" class="nav-mobile">GIỚI THIỆU</a></li>
                            <li><a href="../dichvu.html" class="nav-mobile">DỊCH VỤ</a></li>
                            <li><a href="../sanpham.html" class="nav-mobile">SẢN PHẨM</a></li>
                            <li><a href="../tintuc.html" class="nav-mobile">TIN TỨC</a></li>
                            <li><a href="../lienhe.html" class="nav-mobile">LIÊN HỆ</a></li>
                            <li><a href="../danhnhap.html" class="nav-mobile">ĐĂNG NHẬP</a></li>
                            <li><a href="../src/giohang.html" class="nav-mobile">GIỎ HÀNG CỦA BẠN</a></li>
                        </ul>
                    </label>
                </div>
            </div>
        </div>
    </header>
    <script>
        //tìm kiếm
        document.getElementById('search-button').addEventListener('click', function () {
            var query = document.getElementById('search-input').value.toLowerCase();
            if (query === 'thanh lọc') {
                window.location.href = 'thanhloccoban.html';
            } else if (query === 'Detox 3 ngày') {
                window.location.href = 'detox3ngay.html';
            } else if (query === 'cần tây') {
                window.location.href = 'nuocuongcantay.html';
            } else {
                alert('Không có sản phẩm');
            }
        });
        

        //ĐÁNH GIÁ SẢN PHẨM
        document.addEventListener('DOMContentLoaded', () => {
        const reviewForm = document.getElementById('reviewForm');
        const reviewList = document.querySelector('.review-list');

        reviewForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const name = document.getElementById('reviewName').value;
        const rating = document.getElementById('reviewRating').value;
        const comment = document.getElementById('reviewComment').value;

        // Tạo phần tử mới cho đánh giá
        const newReview = document.createElement('div');
        newReview.classList.add('review-item');
        newReview.innerHTML = 
            <div>
                <strong>${name}</strong>
                <span class="review-rating">${'★'.repeat(rating)}${'☆'.repeat(5 - rating)}</span>
                <p>${comment}</p>
            </div>
        ;
        // Thêm đánh giá mới vào danh sách
        reviewList.appendChild(newReview);
        // Xóa nội dung form sau khi gửi
        reviewForm.reset();
        });
        });


        //CHAT BOX
function toggleChatBox() {
    const chatBox = document.querySelector('.chatbox-container');
    chatBox.style.display = chatBox.style.display === 'none' || chatBox.style.display === '' ? 'block' : 'none';
}
function sendMessage() {
    const input = document.getElementById('chatInput');
    const chatMessages = document.getElementById('chatMessages');

    if (input.value.trim() !== '') {
        // Tạo một dòng tin nhắn mới
        const message = document.createElement('div');
        message.textContent = input.value;
        message.style.padding = '5px';
        message.style.marginBottom = '5px';
        message.style.borderRadius = '5px';
        message.style.backgroundColor = '#e0ffe0'; // Màu nền tin nhắn
        message.style.color = '#2d7a2d';

        // Thêm tin nhắn vào hộp trò chuyện
        chatMessages.appendChild(message);

        // Cuộn xuống cuối chatbox
        chatMessages.scrollTop = chatMessages.scrollHeight;
        // Xóa nội dung trong ô nhập liệu
        input.value = '';
    }
}
    </script>
    <!-- CHI TIẾT Detox 3 ngày -->
    <!-- POP UP thêm vào giỏi hàng -->
    <div class="modal fade" id="popupdualeo" tabindex="-1"  aria-hidden="true"> 
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content ">
                <div class="modal-header">
                    <h4>Detox Clear</h4>
                    <span data-bs-target="#popupdualeo" data-bs-dismiss="modal">
                        <svg xmlns="http://www.w3.org/2000/svg" height="25" width="25" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#a0a1a2" d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                    </span> 
                </div>
                <div class="modal-body d-flex ">
                    <div class="product-500g mr-20">
                        <div class="img">
                            <img src="../images/detox3ngay2.png" alt="">
                            <p>1 chai nhựa</p>
                        </div>
                        <div class="price d-flex ">
                            <p class="price-first"data-price="880000">880.000đ</p><p class="small price-last">/7 ngày</p>
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button">-</button>
                            <input type="text" class="form-control" value="0">
                            <button class="btn btn-outline-secondary" type="button">+</button>
                          </div>
                    </div>
                    <div class="product-1kg mr-20">
                        <div class="img">
                            <img src="../images/detox3ngay1.png" alt="">
                            <p>1 chai thủy tinh</p>
                        </div>
                        <div class="price d-flex ">
                            <p class="price-first"data-price="1250000">1.250.000đ</p><p class="small price-last">/10 ngày</p> <!--gán giá cho biến-->
                        </div>
                        <div class="input-group mb-3">
                            <button class="btn btn-outline-secondary" type="button">-</button>
                            <input type="text" class="form-control" value="0">
                            <button class="btn btn-outline-secondary" type="button">+</button>
                          </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn">
                        Hoàn tất
                        <div class="total-price d-flex justify-content-center">
                            <p>0</p>
                            <p>đ</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
     <!--Phần đường dẫn giữa 3 trang-->
    <div class="bread-crumbs"> 
        <p>
            <a href="../sanpham.html">SẢN PHẨM /</a>
            <a href="../thanhloc3.html">THANH LỌC - GIẢM CÂN - GIẢM MỠ /</a>
            <span> MIX DEXTOX S13</span>
        </p>
    </div>
    <!-- SLIDE Detox 3 ngày-->
    <div class="container mt-4">
        <div class="row g-2"> 
            <div class="col-md-4"> <!--chứa hình ảnh-->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php if (!empty($images)): ?>
                <?php foreach ($images as $idx => $img): ?>
                    <div class="carousel-item<?= $idx === 0 ? ' active' : '' ?>">
                        <img src="<?= htmlspecialchars($img) ?>" class="d-block w-100" alt="Ảnh sản phẩm">
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="carousel-item active">
                    <img src="../images/default-product.png" class="d-block w-100" alt="No image">
                </div>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="carousel-thumbnails mt-3">
        <?php if (!empty($images)): ?>
            <?php foreach ($images as $idx => $img): ?>
                <img src="<?= htmlspecialchars($img) ?>" class="img-thumbnail" data-bs-target="#carouselExample" data-bs-slide-to="<?= $idx ?>" <?= $idx === 0 ? 'aria-current="true"' : '' ?> aria-label="Slide <?= $idx+1 ?>">
            <?php endforeach; ?>
        <?php else: ?>
            <img src="../images/default-product.png" class="img-thumbnail" aria-label="No image">
        <?php endif; ?>
    </div>
            </div>
            <div class="col-md-8 "> <!--chứa nội dung sản phẩm-->
                <div class="product-title"> <!--phần tên và nút mua-->
                    <div class=" d-flex  justify-content-between ">
                        <h2><?= htmlspecialchars($sp['ten'] ?? 'Đang cập nhật') ?></h2>
                        <button id="add-to-cart-btn" class="btn " type="button" data-bs-toggle="modal" data-bs-target="#popupdualeo">
                        <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5" viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ffffff" d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                        MUA
                        </button>
                    </div>
                    <div class=" d-flex  justify-content-between "> <!--phần giá và chia sẻ, ưu đãi-->
                        <div class="h4 fw-bold " style="margin-top: 20px;font-family: Arial, Helvetica, sans-serif;color:#C50017">
                            <?= isset($sp['donGia']) ? number_format($sp['donGia']) : 'Đang cập nhật' ?>
                            <span style="font-size: 0.6em;color:#9DA7BC">
                            /1 chai
                            </span>
                            <p class="share" >
                                <svg xmlns="http://www.w3.org/2000/svg" height="12" width="14" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#ced2da" d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32h82.7L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3V192c0 17.7 14.3 32 32 32s32-14.3 32-32V32c0-17.7-14.3-32-32-32H320zM80 32C35.8 32 0 67.8 0 112V432c0 44.2 35.8 80 80 80H400c44.2 0 80-35.8 80-80V320c0-17.7-14.3-32-32-32s-32 14.3-32 32V432c0 8.8-7.2 16-16 16H80c-8.8 0-16-7.2-16-16V112c0-8.8 7.2-16 16-16H192c17.7 0 32-14.3 32-32s-14.3-32-32-32H80z"/></svg>
                                Chia sẻ
                            </p>
                        </div>
                        <div class="special-offer">
                            <h4><img src="../images/lua.png" width="20px">ƯU ĐÃI ĐẶC BIỆT</h2>
                            <p>Mua combo 2 chai giảm 20%</p>
                        </div>
                    </div>
                    
                </div>
                <p class="product-description"> <!--mô tả và công dụng-->
                    <?= isset($sp['khaiNiem']) ? nl2br($sp['khaiNiem']) : '' ?>
                </p>
                <p style="color:rgb(34, 102, 34)"><b> Mô tả</b></p>
                <ul>
                    <li><b>Thành phần</b>: <?= nl2br(htmlspecialchars($sp['thanhPhan'] ?? '')) ?></li>
                    <li><b>Cách sử dụng</b>: <?= nl2br(htmlspecialchars($sp['cachSuDung'] ?? '')) ?></li>
                    <li><b>Cách bảo quản</b>: <?= nl2br(htmlspecialchars($sp['cachBaoQuan'] ?? '')) ?></li>
                    <li><b>Dung tích</b>: <?= htmlspecialchars($sp['dungTich'] ?? '') ?></li>
                </ul>
            </div>
        </div>
    </div>
    <!--ĐÁNH GIÁ VÀ TIN TỨC-->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
        <!-- Phần Đánh giá sản phẩm (giữ nguyên phần cũ) -->
                <div class="product-reviews mt-4">
                    <h3>Đánh giá sản phẩm</h3>
                    <div class="review-list">
                        <!-- Ví dụ đánh giá -->
                        <div class="review-item">
                            <strong>Nguyễn Văn A</strong>
                            <span class="review-rating">★★★★★</span>
                            <p>Sản phẩm rất tốt, chất lượng vượt mong đợi!</p>
                        </div>
                        <div class="review-item">
                            <strong>Trần Thị B</strong>
                            <span class="review-rating">★★★★☆</span>
                            <p>Hương vị tuyệt vời, sẽ mua thêm lần sau.</p>
                        </div>
                    </div>
                    <div class="add-review mt-3">
                        <h4>Thêm đánh giá của bạn</h4>
                        <form id="reviewForm">
                            <div class="form-group mb-3">
                                <label for="reviewName">Tên của bạn:</label>
                                <input type="text" id="reviewName" class="form-control" placeholder="Nhập tên của bạn" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="reviewRating">Đánh giá:</label>
                                <select id="reviewRating" class="form-control">
                                    <option value="5">★★★★★ </option>
                                    <option value="4">★★★★☆</option>
                                    <option value="3">★★★☆☆ </option>
                                    <option value="2">★★☆☆☆</option>
                                    <option value="1">★☆☆☆☆ </option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="reviewComment">Nhận xét:</label>
                                <textarea id="reviewComment" class="form-control" rows="3" placeholder="Viết nhận xét của bạn..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary ">Gửi đánh giá</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
        <!--tin tức nổi bật-->
                <div class="featured-news">
                    <h3>TIN TỨC NỔI BẬT</h3>
                    <ul>
                        <li>
                            <img src="../images/detox3ngay1.png" alt="Salad thải độc">
                            <a href="file:///C:/Users/This%20PC/Documents/K%C3%8C%201/WEB/BTL/BTL-Web/chitiettintuc-1.html">
                                Cơ chế thải độc cơ thể tự nhiên có thể bạn chưa biết!
                            </a>
                        </li>
                        <li>
                            <img src="../images/detoxclean1.png" alt="La’Zen">
                            <a href="file:///C:/Users/This%20PC/Documents/K%C3%8C%201/WEB/BTL/BTL-Web/chitiettintuc-2.html">
                                Nước ép cần tây có tác dụng gì? Hướng dẫn cách uống nước cần tây lành mạnh</a>
                        </li>
                        <li>
                            <img src="../images/thumb1.png" alt="Catalog Tết">
                            <a href="file:///C:/Users/This%20PC/Documents/K%C3%8C%201/WEB/BTL/BTL-Web/chitiettintuc-3.html">
                                Các dấu hiệu cảnh báo cơ thể cần được thanh lọc</a>
                        </li>
                        <li>
                            <img src="../images/detox3ngay3.png" alt="Quà Tết">
                            <a href="file:///C:/Users/This%20PC/Documents/K%C3%8C%201/WEB/BTL/BTL-Web/chitiettintuc-4.html">
                                Smoothie là gì? Có phải là đồ uống vừa lạ vừa quen?
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="tab-content section-content mt-2" id="myTabContent">
            <div class="section-tabs mt-4">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-bs-toggle="tab" href="#home" ...>QUY TRÌNH SẢN XUẤT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" ...>ỨNG DỤNG CHẾ BIẾN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact" ...>BẢO QUẢN</a>
                    </li>
                    </ul>

            </div>
            <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>Quy trình sản xuất detox 3 ngày bao gồm nhiều bước, từ khâu lựa chọn nguyên liệu tươi ngon đến quá trình chế biến và đóng gói sản phẩm cuối cùng. Dưới đây là những bước chính trong quy trình này:</p>
                <ul>
                    <li><b>Lựa chọn và sơ chế nguyên liệu</b> Chọn những cây cần tây tươi ngon, không bị dập nát, lá xanh mướt. Rửa sạch cần tây nhiều lần dưới vòi nước chảy để loại bỏ đất cát và các chất bẩn</li>
                    <li><b>Ép lấy nước:</b>Nguyên liệu sau khi sơ chế được cho vào máy ép chậm hoặc máy ép ly tâm để ép lấy nước. Máy ép chậm giúp giữ lại được nhiều vitamin, khoáng chất và chất xơ hơn so với máy ép ly tâm.</li>
                    <li><b>Pha chế và đóng gói:</b>Nước ép cần tây nguyên chất có thể được pha thêm nước lọc, mật ong hoặc các loại trái cây khác để tạo ra hương vị đa dạng và dễ uống hơn.</li>
                    <li><b>Pasteurization (tiệt trùng):</b>Tiệt trùng giúp loại bỏ vi khuẩn và kéo dài thời hạn sử dụng của sản phẩm.</li>
                    <li><b>Kiểm tra chất lượng và đóng gói:</b>  Sản phẩm được kiểm tra về các chỉ tiêu như độ pH, độ ngọt, độ trong, vi sinh vật... để đảm bảo chất lượng.</li>
                </ul>
            </div>
            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <p>Detox 3 ngày có thể được kết hợp với các loại trái cây. Dưới đây là một số loại phổ biến:</p>
                    <ul>
                        <li><strong>Detox 3 ngày - táo - chanh:</strong> Vị ngọt của táo kết hợp với vị chua của chanh tạo nên một thức uống thanh mát và dễ uống.</li>
                        <li><strong>Detox 3 ngày - dứa:</strong> Sự kết hợp hoàn hảo giữa vị ngọt của dứa và vị hăng của cần tây, giúp tăng cường năng lượng.</li>
                        <li><strong>Detox 3 ngày - cà rốt - táo:</strong> Một công thức cổ điển, cung cấp nhiều vitamin và khoáng chất cho cơ thể.</li>
                        <li><strong>Detox 3 ngày - dưa chuột - bạc hà:</strong> Thức uống giải nhiệt, thanh lọc cơ thể hiệu quả.</li>
                        <li><strong>Detox 3 ngày - nước chanh - dưa chuột:</strong> Giúp thanh lọc cơ thể, giảm viêm, hỗ trợ giảm cân.</li>
                        <li><strong>Detox 3 ngày - nước dứa - bạc hà:</strong>Giúp giải nhiệt, thanh lọc cơ thể, hỗ trợ tiêu hóa.</li>
                        <li><strong>Detox 3 ngày - Trà thảo mộc:</strong> Trà hoa cúc, trà gừng, trà bạc hà... giúp thư giãn, giảm căng thẳng, hỗ trợ tiêu hóa.</li>

                    </ul>
                    <div class="container mt-5">
                        <h2>Nước uống pha cùng nước detox 3 ngày</h2>
                        <div class="food-container">
                            <button class="scroll-btn left" onclick="customscrollLeft()">&#10094;</button>
                            <div class="food-scroll">
                                <div class="food-item"><img src="../images/mix1.webp" ><p>Detox cần tây - táo - chanh</p></div>  <!--thay ảnh-->
                                <div class="food-item"><img src="../images/mix2.jpg" ><p>Detox cần tây - dứa</p></div>
                                <div class="food-item"><img src="../images/mix3.jpg" ><p>Detox cần tây - cà rốt - táo</p></div>
                                <div class="food-item"><img src="../images/mix4.webp" ><p>Detox 3 ngày - dưa chuột - bạc hà</p></div>
                                <div class="food-item"><img src="../images/mix5.jpg" ><p>Detox cần tây - nước chanh - dưa chuột</p></div>
                                <div class="food-item"><img src="../images/mix6.png" ><p>Detox cần tây - nước dứa - bạc hà</p></div>
                                <div class="food-item"><img src="../images/mix7.jpg" ><p>Detox cần tây - trà thảo mộc</p></div>

                            </div>
                            <button class="scroll-btn right" onclick="customscrollRight()">&#10095;</button>
                        </div>
                    </div>
                    
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <p>Để bảo quản dưa Detox - cần tây một cách hiệu quả và kéo dài thời gian sử dụng, bạn có thể thực hiện các bước sau:</p>
                <ul>
                    <li><strong>Bảo quản trong tủ lạnh:</strong> Nên uống ngay sau khi ép để đảm bảo hương vị và dinh dưỡng tươi ngon nhất. Nếu không thể uống ngay, hãy bảo quản trong tủ lạnh, nhưng không quá 24 giờ.</li>
                    <li><strong>Sử dụng ống hút bằng thủy tinh:</strong> Ống hút bằng thủy tinh sẽ không làm thay đổi hương vị của nước ép và an toàn hơn cho sức khỏe so với ống hút nhựa.</li>
                    <li><strong>Thêm một chút chanh:</strong>  Việc thêm một lát chanh vào nước ép có thể giúp ngăn chặn quá trình oxy hóa và giữ cho nước ép tươi lâu hơn.</li>
                    <li><strong>Không nên để nước ép cần tây quá lâu:</strong>  Khi tiếp xúc với không khí, các chất chống oxy hóa trong nước ép sẽ bị oxy hóa, làm giảm giá trị dinh dưỡng.</li>
                    <li><strong>Không hâm nóng:</strong>Hâm nóng sẽ làm mất đi các vitamin và khoáng chất có trong nước ép.</li>
                </ul>
                <p>Để tận hưởng trọn vẹn hương vị và lợi ích của detox cần tây, hãy ưu tiên uống ngay sau khi ép. Nếu không thể uống ngay, hãy bảo quản đúng cách trong tủ lạnh và sử dụng trong vòng 24 giờ.</p>
                
            
    </div>
        </div>
    </div>
    <!--SẢN PHẨM TƯƠNG TỰ-->
    <div class="similar-products ">
        <h2 class="text-center">Sản phẩm tương tự</h2> 
        <div class="row g-4">
            <div class="col-md-3">
                <a href="../thanhloc2.html"> 
                    <img src="../images/detox3ngay1.png" alt="">
                    <p class="product-name">Detox 3 ngày</p>
                </a>
            </div>
            <div class="col-md-3">
                <a href="../thanhloc3.html"> 
                    <img src="../images/detoxclean1.png" alt="">
                    <p class="product-name"> Detox clean</p>
                </a>
            </div>
            <div class="col-md-3">
                <a href="../thanhloc4.html"> 
                    <img src="../images/detoxclean2.png" alt="">
                    <p class="product-name"> Thanh lọc cơ thể</p>
                </a>
            </div>
            <div class="col-md-3">
                <a href="../thanhloc5.html"> 
                    <img src="../images/detox3ngay2.png" alt="">
                    <p class="product-name">Detox S13</p>
                </a>
            </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/dualeotini.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- FOOTER -->
    <footer>
        <div class="footer-container">
            <div class="footer-info">
                <img src="../images/logo.png" width="130px" height="100px" alt="logo">
                <h2>Fit & Fresh Detox</h2>
                <h2>Các chi nhánh</h2>
                    <p>Cơ sở 1: 12 Chùa Bộc, Đống Đa, Hà Nội</p>
                    <p>Cơ sở 2: 86 Nguyễn Ngọc Nại,Thanh Xuân, Hà Nội</p>
                    <a href="mailto:fit&fresh@gmail.com" class="contact"><svg xmlns="http://www.w3.org/2000/svg"
                            height="14" width="14"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                        </svg>
                        fit&fresh@gmail.com</a><br>
                    <a href="tel:0986868686"><svg xmlns="http://www.w3.org/2000/svg" height="14" width="14"
                            viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                            <path fill="#ffffff"
                                d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z" />
                        </svg>
                        0986868686</a>
            </div>
            <div class="footer-gioithieu">
                <h3>Hỗ trợ</h3>
                <ul>
                    <li><a href="../gioithieu.html">>> &nbsp; Giới thiệu</a></li>
                    <li><a href="../tintuc.html">>> &nbsp; Tin tức</a></li>
                    <li><a href="../lienhe.html">>> &nbsp; Liên hệ</a></li>
                </ul>
            </div>
            <div class="footer-sanpham">
                <h3>Sản Phẩm</h3>
                <ul>
                    <li><a href="../thanhloc2.html">Thanh lọc cơ bản</a></li>
                    <li><a href="../thanhloc3.html">Thanh lọc-Giảm cân-Giảm mỡ</a></li>
                    <li><a href="../thanhloc4.html">Thanh lọc chuyên sâu</a></li>
                    <li><a href="../thanhloc5.html">Juice and Smoothie</a></li>
                </ul>
            </div>
            <div class="footer-map">
                <h3>Bản đồ đến cửa hàng</h3>
                <div class="map-container">
                    <div class="branch">
                        <p><strong>Cơ sở 1:</strong> 12 Chùa Bộc, Đống Đa, Hà Nội</p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.768131927345!2d105.824113314245!3d21.03642179280496!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab850a2b2e2d%3A0xdb7ecfe2d60b2237!2zMTIgQ2jhu6MgQuG7m2MsIMSQ4buZbmcgxJDhuqE!5e0!3m2!1sen!2s!4v1686888888888"
                            width="180" height="130" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="branch">
                        <p><strong>Cơ sở 2:</strong> 86 Nguyễn Ngọc Nại, Thanh Xuân, Hà Nội</p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8888888!2d105.810888888!3d21.004888888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab88888888%3A0x123456789abcdef!2zODYgTmfFqW4gTmfhu41jIE7hu5FpLCBUaGFuaCBYdeG6p24sIEjDoG5v4buNYQ!5e0!3m2!1sen!2s!4v1686888888889"
                            width="180" height="130" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <div class="footer-bottom">
            <p>Bản quyền <svg xmlns="http://www.w3.org/2000/svg" height="14" width="14"
                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                    <path fill="#ffffff"
                        d="M256 48a208 208 0 1 1 0 416 208 208 0 1 1 0-416zm0 464A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM199.4 312.6c-31.2-31.2-31.2-81.9 0-113.1s81.9-31.2 113.1 0c9.4 9.4 24.6 9.4 33.9 0s9.4-24.6 0-33.9c-50-50-131-50-181 0s-50 131 0 181s131 50 181 0c9.4-9.4 9.4-24.6 0-33.9s-24.6-9.4-33.9 0c-31.2 31.2-81.9 31.2-113.1 0z" />
                </svg>&nbsp;2024 Fit&Fresh- Lập trình và thiết kế bởi Nhóm 10</p>
        </div>
    </footer>
    <div class="social-buttons" style="position: fixed; right: 20px; top: 50%; transform: translateY(-50%); display: flex; flex-direction: column; gap: 10px;">
        <!-- Nút gọi điện -->
        <a href="tel:0986868686" class="social-button" style="position: relative; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center; border: 2px solid #fa314a; border-radius: 50%; background-color: white;">
            <!-- Hiệu ứng sóng chuyển động -->
            <span style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 2px solid rgba(250, 49, 74, 0.5); border-radius: 50%; animation: pulse 1.5s infinite;"></span>
            <!-- Icon điện thoại -->
            <img src="https://img.icons8.com/ios-filled/30/fa314a/phone.png" alt="Phone">
        </a>
    
        <!-- Nút Facebook -->
        <a href="https://www.facebook.com/profile.php?id=61570313615062" target="_blank" class="social-button" style="position: relative; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center; border: 2px solid #0078FF; border-radius: 50%; background-color: white;">
            <!-- Hiệu ứng sóng chuyển động -->
            <span style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 2px solid rgba(0, 120, 255, 0.5); border-radius: 50%; animation: pulse 1.5s infinite;"></span>
            <!-- Icon Facebook -->
            <img src="https://img.icons8.com/fluency/30/000000/facebook-new.png" alt="Facebook">
        </a>
    
        <!-- Nút Instagram -->
        <a href="https://www.instagram.com/fit_freshdetox.healthy/" target="_blank" class="social-button" style="position: relative; width: 60px; height: 60px; display: flex; justify-content: center; align-items: center; border: 2px solid #E1306C; border-radius: 50%; background-color: white;">
            <!-- Hiệu ứng sóng chuyển động -->
            <span style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 2px solid rgba(225, 48, 108, 0.5); border-radius: 50%; animation: pulse 1.5s infinite;"></span>
            <!-- Icon Instagram -->
            <img src="https://img.icons8.com/fluency/30/000000/instagram-new.png" alt="Instagram">
        </a>
    </div>
    <!-- Animation Keyframes -->
    <style>
        @keyframes pulse {
            0% {
                transform: scale(1); /* Kích thước ban đầu */
                opacity: 1; /* Độ trong suốt ban đầu */
            }
            100% {
                transform: scale(1.5); /* Sóng mở rộng lớn hơn */
                opacity: 0; /* Sóng mờ dần khi mở rộng */
            }
        }
    </style>
    <script src="../js/header.js"></script>
</body>
</html>