<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrak & Perjanjian</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffd95a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            margin: 0;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            width: 100%;
        }

        .contract-container {
            background-color: #1a4971;
            border-radius: 15px;
            padding: 30px;
            width: 100%;
            max-width: 800px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .contract-title {
            color: white;
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .contract-content {
            background-color: #1a4971;
            border: 2px solid #ffc107;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            color: white;
            height: 400px;
            overflow-y: auto;
        }

        .contract-content::-webkit-scrollbar {
            width: 8px;
        }

        .contract-content::-webkit-scrollbar-track {
            background: #1a4971;
        }

        .contract-content::-webkit-scrollbar-thumb {
            background: #ffc107;
            border-radius: 4px;
        }

        .btn-ok {
            background-color: #ffd95a;
            border: 2px solid #ffc107;
            color: #273043;
            padding: 8px 40px;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: bold;
        }

        .btn-ok:hover {
            background-color: #ffc107;
            color: #1a4971;
        }

        .text-container {
            font-size: 14px;
            line-height: 1.6;
        }

        @media (max-width: 576px) {
            .contract-container {
                padding: 15px;
                width: 90%;
            }

            .contract-content {
                height: 300px;
            }

            .contract-title {
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="contract-container">
        <h1 class="contract-title">Kontrak & Perjanjian</h1>
        <div class="contract-content">
            <div class="text-container">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum ultrices a finit ut volutpat. Vivamus facilisis condimentum est eget luctus. Suspendisse pretium fringilla odio at placerat. Duis enim tortor, sodales eget lorem sit amet, consectetur adipiscing elit. Fusce ut sagittis enim ut facilisis dui. Curabitur arcu ipsum, eleifend vel facilisis pretiumque, condimentum eget ante. Vestibulum a leo ut diam. Vivamus finibus turpis at placerat pretium.</p>
                
                <p>Mauris pharetra augue non erat vitae aliquam. Nam sed lacinia tortor. Fusce ante turpis, viverra vel facilisis sit amet, condimentum id nulla. Sed nec imperdiet eros. Morbi vulputate facilisis nibh, vitae vestibulum nulla molestie vehicula. Sed nec hendrerit eros. Quisque venenatis leo id nibh fringilla tincidunt.</p>
                
                <p>Vivamus vel justo sit amet nunc faucibus dictum. Sed ac felis commodo lacus, ac blandit metus rutrum at. Ut dolor magna, vulputate at purus non, vulputate fermentum arcu. Aliquam at diam nec metus cursus elementum. Morbi auctor malesuada nisi, nec euismod nunc mollis sed.</p>

                <p>Nulla viverra quam est sit pharetra ornare. Quisque congue massa quis lectum magna. Nunc mi dui, luctus non est a, rhoncus dictum tortor. Suspendisse potenti. Cras id imperdiet mauris. Sed quis porttitor nulla. Vivamus ut ipsum vel sapien volutpat ultrices non vel velit. Mauris et venenatis felis.</p>
            </div>
        </div>
        <div class="text-center">
            <a href="regist_pekerja_upload.php" class = "btn btn-ok">OK</a>
            <!-- <button class="btn btn-ok">OK</button> -->
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>