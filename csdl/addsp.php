<?php
include 'connect.php';

// Mảng danh sách sản phẩm và ảnh
$products = [
    [
        'ID' => 'detox3ngay',
        'ten' => 'Detox 3 Ngày',
        'khaiNiem' => 'Detox 3 ngày là liệu trình thanh lọc cơ thể chuyên sâu, giúp bạn loại bỏ độc tố tích tụ, hỗ trợ hệ tiêu hóa khỏe mạnh và tăng cường năng lượng. Với công thức độc đáo từ các loại thảo mộc tự nhiên, sản phẩm này sẽ giúp bạn cảm thấy nhẹ nhõm, sảng khoái và làn da tươi trẻ hơn chỉ sau 3 ngày. Hãy trải nghiệm sự thay đổi tích cực của cơ thể để đón một mùa hè tràn đầy năng lượng!',
        'thanhPhan' => 'Thay đổi théo ngày và cơ thể gồm: kate, cải bó xôi, dưa leo, thanh long, chuối, dứa, táo, hạt chia, hoa quả theo mùa, nước điện giải probiotic.',
        'cachSuDung' => 'Uống theo số thứ tự được dán trên nắp chai, lắc nhẹ trước khi uống.',
        'cachBaoQuan' => 'Bảo quản ngăn mát tủ lạnh 3-5 độ.',
        'dungTich' => '300ml - 500ml',
        'donGia' => 1000000,
        'images' => ['detox3ngay1.png', 'detox3ngay2.png', 'detox3ngay3.png']
    ],
    [
        'ID' => 'detoxclear',
        'ten' => 'Detox Clear',
        'khaiNiem' => 'Detox Clear là liệu trình thanh lọc cơ thể chuyên sâu, giúp bạn loại bỏ độc tố tích tụ, hỗ trợ hệ tiêu hóa khỏe mạnh và tăng cường năng lượng. Với công thức độc đáo từ các loại thảo mộc tự nhiên, sản phẩm này sẽ giúp bạn cảm thấy nhẹ nhõm, sảng khoái và làn da tươi trẻ hơn chỉ sau 3 ngày. Hãy trải nghiệm sự thay đổi tích cực của cơ thể để đón một mùa hè tràn đầy năng lượng!',
        'thanhPhan' => 'Thay đổi théo ngày và cơ thể gồm: kate, cải bó xôi, dưa leo, thanh long, chuối, dứa, táo, hạt chia, hoa quả theo mùa, nước điện giải probiotic.',
        'cachSuDung' => 'Uống theo số thứ tự được dán trên nắp chai, lắc nhẹ trước khi uống',
        'cachBaoQuan' => 'Bảo quản ngăn mát tủ lạnh 3-5 độ',
        'dungTich' => '300ml - 500ml',
        'donGia' => 1500000,
        'images' => ['detoxclean1.png', 'detoxclean2.png', 'detoxclean3.png']
    ],
    [
        'ID' => 'cantay',
        'ten' => 'Nuớc Ép Cần Tây',
        'khaiNiem' => 'Nước ép cần tây dựa trên nguyên tắc cung cấp cho cơ thể một lượng lớn chất xơ và nước, giúp kích thích quá trình đào thải độc tố qua đường tiêu hóa và tăng cường hoạt động của gan, thận. Bên cạnh đó, các chất chống oxy hóa trong cần tây còn giúp bảo vệ tế bào, ngăn ngừa lão hóa và tăng cường hệ miễn dịch.Liệu trình 10 ngày cho thấy sự thay đổi nhẹ nhàng Mỗi ngày 1 chai 3-500ml cần tây dùng các buổi sáng Liệu trình vẫn ăn không thay bữa.',
        'thanhPhan' => 'kate(10%), cải bó xôi(100g), dưa leo(10-50kg), thanh long(40g), chuối(200g), dứa, táo, hạt chia, hoa quả theo mùa, nước điện giải probiotic.',
        'cachSuDung' => 'Uống theo số thứ tự được dán trên nắp chai, lắc nhẹ trước khi uống',
        'cachBaoQuan' => 'Bảo quản ngăn mát tủ lạnh 3-5 độ',
        'dungTich' => '300ml - 500ml',
        'donGia' => 850000,
        'images' => ['cantay1.jpg', 'cantay2.png', 'cantay3.png']
    ],
    [
        'ID' => 'mixdetox',
        'ten' => 'Mix Detox S13',
        'khaiNiem' => 'Mix detox S13 là gói kết hợp sữa hạt, nước ép & sinh tố Mix Detox - S16 gồm 16 chai dung tích 325ml (size S) được chia ra giao trong 2 tuần.',
        'thanhPhan' => 'Gói kết hợp sữa hạt, nước ép & sinh tố Mix - S16 kéo dài trong 2 tuần, đảm bảo đem đến cho khách hàng dinh dưỡng riêng biệt của 16 vị sữa hạt, nước ép, sinh tố nổi bật trong menu nhà La zen.',
        'cachSuDung' => 'Mỗi ngày 3 chai sữa hạt và nước ép/sinh tố hoàn toàn có thể thay thế cho 2 bữa chính (sáng + tối) và 1 bữa phụ trong ngày của bạn.',
        'cachBaoQuan' => 'Bảo quản ngăn mát tủ lạnh 3-5 độ',
        'dungTich' => '300ml - 500ml',
        'donGia' => 2558000,
        'images' => ['mixdetoxS131.png', 'mixdetoxS132.png', 'mixdetoxS133.png']
    ],
    [
        'ID' => 'suahat',
        'ten' => 'Sữa hạt dinh dưỡng',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 40000,
        'images' => ['sp1.png']
    ],
    [
        'ID' => 'sp2',
        'ten' => 'Thanh lọc cơ thể',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1080000,
        'images' => ['sp2.png']
    ],
    [
        'ID' => 'lungdetox',
        'ten' => 'Lung detox',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 580000,
        'images' => ['sp3.png']
    ],
    [
        'ID' => 'sp5',
        'ten' => 'Detox Clear Skin',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1050000,
        'images' => ['sp5.png']
    ],
    [
        'ID' => 'liverdetox',
        'ten' => 'Liver detox',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 490000,
        'images' => ['sp3.png']
    ],
    [
        'ID' => 'sp10',
        'ten' => 'Detox Basic 3D',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1080000,
        'images' => ['sp10.png']
    ],
    [
        'ID' => 'detox4d',
        'ten' => 'Detox 4D',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1580000,
        'images' => ['anh13.png']
    ],
    [
        'ID' => 'ketoslim',
        'ten' => 'Keto Slim',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1225000,
        'images' => ['anh4.png']
    ],
    [
        'ID' => 'anh6',
        'ten' => 'Keto Weight Loss 1',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1250000,
        'images' => ['anh6.png']
    ],
    [
        'ID' => 'anh5',
        'ten' => 'Keto Weight Loss 2',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1650000,
        'images' => ['anh5.png']
    ],
    [
        'ID' => 'anh7',
        'ten' => 'Keto Cellulite',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 990000,
        'images' => ['anh7.png']
    ],
    [
        'ID' => 'anh10',
        'ten' => 'Keto Cellulite 2',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1225000,
        'images' => ['anh10.png']
    ],
    [
        'ID' => 'anh11',
        'ten' => 'Thanh lọc cơ thể',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1080000,
        'images' => ['anh11.png']
    ],
    [
        'ID' => 'ep3d',
        'ten' => 'Ép 3D',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 580000,
        'images' => ['anh8.png']
    ],
    [
        'ID' => 'mixdetox',
        'ten' => 'Mix Detox S13 2',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 2558000,
        'images' => ['mixdetoxS132.png']
    ],
    [
         'ID' => 'mixdetox2',
        'ten' => 'Mix Detox S13 3',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 2558000,
        'images' => ['mixdetoxS133.png']
    ],
    [
         'ID' => 'mixdetox3',
        'ten' => 'Mix Detox S13 4',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 2558000,
        'images' => ['anh9.png']
    ],
    [
          'ID' => 'mixdetox4',
        'ten' => 'Mix Detox S13 5',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 990000,
        'images' => ['mixdetoxS135.png']
    ],
    [
        'ID' => 'dtclean1',
        'ten' => 'Detox Clean 1',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1750000,
        'images' => ['detoxclean1.png']
    ],
    [
        'ID' => 'dtclean2',
        'ten' => 'Detox Clean 2',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1750000,
        'images' => ['detoxclean2.png']
    ],
    [
        'ID' => 'dtclean3',
        'ten' => 'Detox Clean 3',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1750000,
        'images' => ['detoxclean3.png']
    ],
    [
        'ID' => 'dtsmoothie',
        'ten' => 'Detox Smoothie',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1080000,
        'images' => ['anh16.png']
    ],
    [
        'ID' => 'dtvitamin',
        'ten' => 'Detox Vitamin',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1580000,
        'images' => ['anh16.png']
    ],
    [
        'ID' => 'mixdetox1',
        'ten' => 'MixDetox Sáng Da',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1050000,
        'images' => ['anh15.png']
    ],
    [
        'ID' => 'mixdetox2',
        'ten' => 'MixDetox Chuối Ca Cao',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1490000,
        'images' => ['anh17.png']
    ],
    [
        'ID' => 'sua1',
        'ten' => 'Sữa Hạt Điều Cacao',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 940000,
        'images' => ['anh18.png']
    ],
    [
        'ID' => 'sua2',
        'ten' => 'Sữa Hạt Sen Đậu Xanh',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1080000,
        'images' => ['anh19.png']
    ],
    [
        'ID' => 'mixdetox3',
        'ten' => 'MixDetox Sáng da',
        'khaiNiem' => null,
        'thanhPhan' => null,
        'cachSuDung' => null,
        'cachBaoQuan' => null,
        'dungTich' => null,
        'donGia' => 1580000,
        'images' => ['anh20.png']
    ],
    // 👉 Thêm các sản phẩm khác tại đây...
];

foreach ($products as $p) {
    $id = $p['ID'];

    // Kiểm tra tồn tại
    $check = mysqli_query($conn, "SELECT * FROM sanpham WHERE ID = '$id'");
    if (mysqli_num_rows($check) == 0) {
        // Thêm sản phẩm
        $sql1 = "INSERT INTO sanpham (ID, ten, khaiNiem, thanhPhan, cachSuDung, cachBaoQuan, dungTich, donGia)
                 VALUES (
                     '{$p['ID']}', '{$p['ten']}', '{$p['khaiNiem']}', '{$p['thanhPhan']}', 
                     '{$p['cachSuDung']}', '{$p['cachBaoQuan']}', '{$p['dungTich']}', {$p['donGia']}
                 )";
        if (mysqli_query($conn, $sql1)) {
            echo "✔ Thêm sản phẩm: {$p['ten']}<br>";
        } else {
            echo "❌ Lỗi thêm sản phẩm {$p['ID']}: " . mysqli_error($conn) . "<br>";
        }
    } else {
        echo "⚠ Sản phẩm {$p['ID']} đã tồn tại<br>";
    }

    // Thêm ảnh
    foreach ($p['images'] as $img) {
        $sql2 = "INSERT INTO sanpham_images (sanphamID, imagePath) VALUES ('$id', '$img')";
        if (mysqli_query($conn, $sql2)) {
            echo "✔ Thêm ảnh: $img cho sản phẩm $id<br>";
        } else {
            echo "❌ Lỗi thêm ảnh $img: " . mysqli_error($conn) . "<br>";
        }
    }

    echo "<hr>";
}

mysqli_close($conn);
?>
