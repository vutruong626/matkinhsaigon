function ChangeToSlug()
{
    var title, slug;

    //Lấy text từ thẻ input pushSlug
    pushSlug = document.getElementById("pushSlug").value;
    // pushAlias = document.getElementById("pushAlias").value;

    //Đổi chữ hoa thành chữ thường
    slug = pushSlug.toLowerCase();
    
    

    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}




$(".loadSampleData").click(function() {
    var data = "<h4><strong>Bạn được trải nghiệm những g&igrave;?</strong></h4>" +
        "<p>Nếu bạn l&agrave; một người l&atilde;o thị nhưng trước đ&oacute; bạn cũng đ&atilde; " +
        "bị cận thị, bạn cần sử dụng 2 cặp k&iacute;nh ri&ecirc;ng biệt : Một cặp k&iacute;nh để nh&igrave;n xa, " +
        "v&agrave; một cặp k&iacute;nh kh&aacute;c để nh&igrave;n gần. Nếu bạn sử dụng &lsquo;k&iacute;nh " +
        "l&atilde;o&rsquo;, điều n&agrave;y khiến bạn trở n&ecirc;n gi&agrave; đi khi cứ phải đeo v&agrave; " +
        "th&aacute;o k&iacute;nh mỗi khi cần đọc s&aacute;ch b&aacute;o hoặc viết chữ Nếu bạn sử dụng &lsquo;k&iacute;nh " +
        "hai tr&ograve;ng&rsquo;, bạn sẽ gặp kh&oacute; khăn khi chuyển v&ugrave;ng nh&igrave;n từ xa tới gần do c&oacute; " +
        "đường ph&acirc;n c&aacute;ch giữa hai v&ugrave;ng nh&igrave;n v&agrave; h&igrave;nh ảnh của bạn trở n&ecirc;n gi&agrave; nua, " +
        "k&eacute;m năng động.</p>" +
        "<img alt=\"\" style='margin: auto' src=\"https://matkinhsaigon.com.vn/public/upload/images/Essilor/%C4%90%E1%BB%95i%20M%C3%A0u%20Gen8/Transitions%20Gen8_2.png\">" +
        "<br/>" +
        "<div class='row'>" +
        "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>" +
        "<h4><strong>Bạn được trải nghiệm những g&igrave;?</strong></h4>" +
        "<p><span style=\"color:rgb(0, 0, 0); font-family:be vietnam,sans-serif; font-size:16px\">" +
        "Ngoài ra, m&ocirc;̣t đi&ecirc;̀u đặc bi&ecirc;̣t b&acirc;́t ngờ trong l&acirc;̀n tái xu&acirc;́t này, Transitions&reg; kh&ocirc;ng chỉ " +
        "xu&acirc;́t hi&ecirc;̣n với 3 màu sắc quen thu&ocirc;̣c trước kia (Kh&oacute;i, Tr&agrave;, Xanh Graphite) mà mang tới t&acirc;̣n 7 m&agrave;u sắc đ&ocirc;̣c đáo " +
        "đ&ecirc;̉ chinh phục hoàn toàn những khách hàng sành đi&ecirc;̣u, y&ecirc;u thời trang. Với b&ocirc;̣ sưu t&acirc;̣p Transitions&reg; Style Colors, bạn c&oacute; " +
        "thể thỏa thích lựa chọn m&agrave;u th&ecirc;m 4 sắc màu c&aacute; t&iacute;nh nữa cho phong cách ri&ecirc;ng của mình (Ngọc Lục Bảo, Xanh Sapphire, Thạch Anh " +
        "T&iacute;m, Hổ Ph&aacute;ch).</span></p>\n</div>" +
        "<div class='col-sm-12 col-md-12 col-lg-6 col-xl-6'>" +
        "<img alt=\"\" style='margin: auto' src=\"https://matkinhsaigon.com.vn/public/upload/images/Essilor/%C4%90%E1%BB%95i%20M%C3%A0u%20Gen8/Transitions%20Gen8_2.png\">" +
        "</div>" +
        "</div>" +
        "<br/>" +
        "<p>Nếu bạn l&agrave; một người l&atilde;o thị nhưng trước đ&oacute; bạn cũng đ&atilde; bị cận thị, bạn cần sử dụng 2 cặp " +
        "k&iacute;nh ri&ecirc;ng biệt : Một cặp k&iacute;nh để nh&igrave;n xa, v&agrave; một cặp k&iacute;nh kh&aacute;c để nh&igrave;n gần. " +
        "Nếu bạn sử dụng &lsquo;k&iacute;nh l&atilde;o&rsquo;, điều n&agrave;y khiến bạn trở n&ecirc;n gi&agrave; đi khi cứ phải đeo v&agrave; " +
        "th&aacute;o k&iacute;nh mỗi khi cần đọc s&aacute;ch b&aacute;o hoặc viết chữ Nếu bạn sử dụng &lsquo;k&iacute;nh hai tr&ograve;ng&rsquo;, " +
        "bạn sẽ gặp kh&oacute; khăn khi chuyển v&ugrave;ng nh&igrave;n từ xa tới gần do c&oacute; đường ph&acirc;n c&aacute;ch giữa hai v&ugrave;ng " +
        "nh&igrave;n v&agrave; h&igrave;nh ảnh của bạn trở n&ecirc;n gi&agrave; nua, k&eacute;m năng động.</p>" +
        "<h4><strong>Bạn được trải nghiệm những g&igrave;?</strong></h4>" +
        "<p>Nếu bạn l&agrave; một người l&atilde;o thị nhưng trước đ&oacute; bạn cũng đ&atilde; bị cận thị, bạn cần sử dụng 2 cặp k&iacute;nh " +
        "ri&ecirc;ng biệt : Một cặp k&iacute;nh để nh&igrave;n xa, v&agrave; một cặp k&iacute;nh kh&aacute;c để nh&igrave;n gần. Nếu bạn sử dụng " +
        "&lsquo;k&iacute;nh l&atilde;o&rsquo;, điều n&agrave;y khiến bạn trở n&ecirc;n gi&agrave; đi khi cứ phải đeo v&agrave; th&aacute;o k&iacute;nh mỗi " +
        "khi cần đọc s&aacute;ch b&aacute;o hoặc viết chữ Nếu bạn sử dụng &lsquo;k&iacute;nh hai tr&ograve;ng&rsquo;, bạn sẽ gặp kh&oacute; khăn khi chuyển " +
        "v&ugrave;ng nh&igrave;n từ xa tới gần do c&oacute; đường ph&acirc;n c&aacute;ch giữa hai v&ugrave;ng nh&igrave;n v&agrave; h&igrave;nh ảnh của bạn " +
        "trở n&ecirc;n gi&agrave; nua, k&eacute;m năng động.</p>" +
        "<ul class='dnkndnfkdnkf'><li>8:30 gặp hướng dẫn vi&ecirc;n</li>" +
        "<li>9:00, bắt đầu tour, tham quan chợ nổi Damnoen Saduak</li>" +
        "<li>Đi xe lửa qua Chợ Đường Sắt Maeklong</li>" +
        "<li>L&ecirc;n thuyền v&agrave; kh&aacute;m ph&aacute; chợ nổi</li></ul>" +
        "<p>Nếu bạn l&agrave; một người l&atilde;o thị nhưng trước đ&oacute; bạn cũng đ&atilde; bị cận thị, bạn cần sử dụng 2 cặp k&iacute;nh " +
        "ri&ecirc;ng biệt : Một cặp k&iacute;nh để nh&igrave;n xa, v&agrave; một cặp k&iacute;nh kh&aacute;c để nh&igrave;n gần. Nếu bạn sử dụng " +
        "&lsquo;k&iacute;nh l&atilde;o&rsquo;, điều n&agrave;y khiến bạn trở n&ecirc;n gi&agrave; đi khi cứ phải đeo v&agrave; th&aacute;o k&iacute;nh" +
        " mỗi khi cần đọc s&aacute;ch b&aacute;o hoặc viết chữ Nếu bạn sử dụng &lsquo;k&iacute;nh hai tr&ograve;ng&rsquo;, bạn sẽ gặp kh&oacute; khăn khi " +
        "chuyển v&ugrave;ng nh&igrave;n từ xa tới gần do c&oacute; đường ph&acirc;n c&aacute;ch giữa hai v&ugrave;ng nh&igrave;n v&agrave; h&igrave;nh ảnh " +
        "của bạn trở n&ecirc;n gi&agrave; nua, k&eacute;m năng động.</p>";
    CKEDITOR.instances.editorContent.setData(data);
    // CKEDITOR.instances.trans_description.setData(data);
});


$(".loadSampleDataSpecifications").click(function() {
    var data =  '<p><img alt="" src="https://matkinhsaigon.com.vn/public/upload/images/Size_G%E1%BB%8Dng/Size-gong-kinh.png" /></p>' +
    '<p><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000"><span style="background-color:#ffffff">1. Chiều d&agrave;i tr&ograve;ng k&iacute;nh : 56mm&nbsp;</span></span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><span style="background-color:#ffffff">2. Chiều d&agrave;i cầu k&iacute;nh : 17mm</span></span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><span style="background-color:#ffffff">3. Chiều d&agrave;i c&agrave;ng k&iacute;nh : 145mm</span></span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><span style="background-color:#ffffff">4. Chiều cao tr&ograve;ng k&iacute;nh&nbsp; : 38mm</span></span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><span style="background-color:#ffffff">5. Chiều d&agrave;i gọng k&iacute;nh : 140mm</span></span></span></span></p>' +
    '<p>&nbsp;</p>';
    CKEDITOR.instances.editorNameSpecifications.setData(data);
    // CKEDITOR.instances.trans_description.setData(data);
});

$(".loadSampleDataConsultingService").click(function() {
    var data =  '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif">&gt;&gt; L&Agrave;M THẾ N&Agrave;O ĐỂ BẢO QUẢN K&Iacute;NH Đ&Uacute;NG C&Aacute;CH :<br />' +
                '<img alt="" src="https://matkinhsaigon.com.vn/public/upload/images/Size_G%E1%BB%8Dng/Ve_sinh_mat_kinh_2022.png" /></span></span></strong></span></p>' +
                '<p><strong><span style="color:#000000"><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif">KHI ĐEO K&Iacute;NH :</span></span></span></strong><br />' +
                '<span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Bạn n&ecirc;n mở gọng k&iacute;nh v&agrave; đeo &aacute;p theo hai b&ecirc;n mang tai một c&aacute;ch nhẹ nh&agrave;ng v&agrave; cẩn thận để tr&aacute;nh bị c&agrave;ng gọng hai b&ecirc;n chọc v&agrave;o mắt.</span></span></span></p>' +
                '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif">KHI TH&Aacute;O K&Iacute;NH :</span></span></strong></span><br />' +
                '<span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Giữ hai b&ecirc;n c&agrave;ng k&iacute;nh v&agrave; th&aacute;o ra một c&aacute;ch nhẹ nh&agrave;ng theo chiều dọc của gương mặt. Kh&ocirc;ng n&ecirc;n chỉ giữ một b&ecirc;n v&agrave; trực tiếp th&aacute;o xuống v&igrave; c&oacute; thể khiến phần gọng bị hư, biến dạng v&agrave; thậm ch&iacute; l&agrave;m c&agrave;ng gọng hai b&ecirc;n bị lỏng lẻo.</span></span></span></p>' +
                '<p><strong><span style="color:#000000"><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif">KHI ĐẶT K&Iacute;NH XUỐNG :</span></span></span></strong><br />' +
                '<span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Để tr&aacute;nh cho tr&ograve;ng k&iacute;nh bị hư hỏng, bạn n&ecirc;n đặt mặt trước của tr&ograve;ng k&iacute;nh ngửa l&ecirc;n tr&ecirc;n.</span></span></span></p>' +
                '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif">KHI VỆ SINH K&Iacute;NH :</span></span></strong></span><br />' +
                '<span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Khi lau, bạn phải giữ b&ecirc;n ngo&agrave;i m&eacute;p gọng v&agrave; chỉ n&ecirc;n lau tr&ograve;ng k&iacute;nh bằng vải chuy&ecirc;n dụng. Kh&ocirc;ng n&ecirc;n lau tr&ograve;ng nếu vẫn c&ograve;n c&aacute;c vật lạ, cứng như c&aacute;t, bụi c&ograve;n b&aacute;m d&iacute;nh tr&ecirc;n tr&ograve;ng c&oacute; thể l&agrave;m bề mặt k&iacute;nh bị bong tr&oacute;c v&agrave; l&agrave;m hỏng lớp phủ.</span></span></span></p>' +
                '<p><strong><span style="color:#000000"><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif">KHI TR&Ograve;NG K&Iacute;NH B&Aacute;M BỤI :</span></span></span></strong><br />' +
                '<span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Khi tr&ograve;ng k&iacute;nh bị bụi b&aacute;m tr&ecirc;n bề mặt, bạn n&ecirc;n rửa qua tr&ograve;ng k&iacute;nh với nước sạch, lau kh&ocirc; bằng khăn mềm, sau đ&oacute; sử dụng khăn vải chuy&ecirc;n dụng để lau. Nếu tr&ograve;ng k&iacute;nh được lau sạch nhưng c&aacute;t bụi c&ograve;n b&aacute;m lại vẫn c&oacute; thể l&agrave;m trầy xước bề mặt k&iacute;nh.</span></span></span></p>' +
                '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif">KHI TR&Ograve;NG K&Iacute;NH QU&Aacute; BẨN :</span></span></strong></span><br />' +
                '<span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Nếu tr&ograve;ng k&iacute;nh qu&aacute; bẩn, h&atilde;y sử dụng chất tẩy trung h&ograve;a pha lo&atilde;ng, sau đ&oacute; rửa lại bằng nước sạch, lau kh&ocirc; bằng khăn mềm rồi d&ugrave;ng khăn vải chuy&ecirc;n dụng để lau lại lần nữa.</span></span></span></p>';
    CKEDITOR.instances.editorNameConsultingService.setData(data);
    // CKEDITOR.instances.trans_description.setData(data);
});

$(".loadSampleDataShoppingGuide").click(function() {
    var data = '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif">HƯỚNG DẪN MUA H&Agrave;NG :&nbsp;</span></span></strong></span></p>' +
    '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif">Bước 1 </span></span></strong></span><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><strong>:</strong> Chọn sản phẩm ưng &yacute; (m&agrave;u sắc, k&iacute;ch cỡ, m&agrave;u sắc..) v&agrave; đặt h&agrave;ng tr&ecirc;n trang web th&agrave;nh c&ocirc;ng</span></span></span></p>' +
    '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif">Bước 2 :</span></span></strong></span><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"> Gọi điện hoặc nhắn tin thống nhất đơn h&agrave;ng Online th&ocirc;ng qua :&nbsp; Hotline 0888368889&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span></span></span></p>' +
    '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif">Bước 3 :</span></span></strong></span><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"> Chuyển tiền thanh to&aacute;n đơn h&agrave;ng tới khoản tới chủ t&agrave;i khoản sau :</span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000">Nếu qu&yacute; kh&aacute;ch lựa chọn h&igrave;nh thức chuyển khoản qua ng&acirc;n h&agrave;ng, h&atilde;y chuyển khoản cho ch&uacute;ng t&ocirc;i v&agrave;o 1 trong số c&aacute;c số t&agrave;i khoản sau đ&acirc;y:</span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><strong>1. ACB Bank </strong>: 1929 8888 8888</span></span></span></p>' +
    '<p><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000">2. </span></span></span></strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#050505"><strong>Vietcombank</strong> : 8888888.301</span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#050505"><strong>3. Vietcombank :</strong> 6666666.301</span></span></span></p>' +
    '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif">Bước 4 :</span></span></strong></span><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"> Ngay khi nhận được tiền, sẽ thực hiện đ&oacute;ng g&oacute;i v&agrave; chuyển h&agrave;ng th&ocirc;ng qua c&ocirc;ng ty chuyển ph&aacute;t Viettel. Qu&yacute; kh&aacute;ch sẽ nhận được sản phẩm trong v&ograve;ng từ 24 đến 72 giờ ( trừ ng&agrave;y nghỉ , thứ 7, chủ nhật).</span></span></span></p>' +
    '<p><span style="color:#000000"><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif">Bước 5 :</span></span></strong></span><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"> X&aacute;c nhận đơn h&agrave;ng đ&atilde; ho&agrave;n th&agrave;nh với kh&aacute;ch h&agrave;ng sau khi kh&aacute;ch nhận được sản phẩm</span></span></span></p>' +
    '<p><a href="https://matkinhsaigon.com.vn/chinh-sach-va-quy-dinh/quy-dinh-phuong-thuc-thanh-toan"><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><img src="https://matkinhsaigon.com.vn/public/upload/images/icon-web/animated-arrow-mk2.gif" style="height:14px; width:24px" /></span></span></span><span style="font-size:10pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#808080"> </span></span></span><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#555555">Hướng dẫn thanh to&aacute;n v&agrave; nhận h&agrave;ng </span></span></span></a></p>';
    CKEDITOR.instances.editorNameShoppingGuide.setData(data);
    // CKEDITOR.instances.trans_description.setData(data);
});

$(".loadSampleDataAddress").click(function() {
    var data = '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><strong>Địa Chỉ 1 :</strong> 301B Điện Bi&ecirc;n Phủ, Phường V&otilde; Thị S&aacute;u , Quận 3, TP. Hồ Ch&iacute; Minh</span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><strong>Địa Chỉ 2 :&nbsp;</strong> 245C X&ocirc; Viết Nghệ Tĩnh, P.17, Q. B&igrave;nh Thạnh, TP. HCM</span></span></span></p>' +
    '<p><strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000">Địa Chỉ </span></span></span><span style="font-size:10pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#808080">&nbsp;</span></span></span></strong><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><strong>3 :</strong>&nbsp; 90 Nguyễn Hữu Thọ, P. Phước Trung, TP. B&agrave; Rịa</span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family: "Be Vietnam",sans-serif"><span style="color:#000000"><img alt="" src="https://matkinhsaigon.com.vn/public/upload/images/icon-web/Logo_mksg_2023_2.png" /></span></span></span></p>';
    CKEDITOR.instances.editorNameAddresse.setData(data);
    // CKEDITOR.instances.trans_description.setData(data);
});


$(".loadSampleDataOpenTime").click(function() {
    var data = '<p><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000"><strong>Thời gian l&agrave;m việc</strong></span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Thứ 2 -Thứ 7 : 7h30 - 20h30</span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Ng&agrave;y lễ &amp; CN : 8h00 - 20h00</span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000"><strong>Hỗ trợ tư vấn</strong></span></span></span></p>' +
    '<p><span style="font-size:12pt"><span style="font-family:"Be Vietnam",sans-serif"><span style="color:#000000">Hotline: 0888368889 - 0966666.301</span></span></span></p>' +
    '<p>&nbsp;</p>' +
    '<p>&nbsp;</p>';
    CKEDITOR.instances.editorNameOpenTime.setData(data);
    // CKEDITOR.instances.trans_description.setData(data);
});