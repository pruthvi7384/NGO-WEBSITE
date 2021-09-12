<?php
    include 'db.php';
    $data = '';
    if(isset($_GET['id'])){
        $payment_id = $_GET['id'];
        $sql = mysqli_query($con,"SELECT * FROM donation WHERE payment_id= '$payment_id'");
        if(mysqli_num_rows($sql)>0){
            $data = mysqli_fetch_assoc($sql);
        }else{
            header("Location:index.php");
        }
    }else{
        header("Location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngo Donation Slip</title>
    <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:ital,wght@0,400;0,500;0,700;1,500&display=swap" rel="stylesheet">
    <!--X- Google Font -X-->

    <!-- Font Awsome Icon CDN -->
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!--X- Font Awsome Icon CDN -X-->
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        ul{
            list-style-type: none;
        }
        a{
            text-decoration:none;
        }
        body{
            font-family: 'Roboto', sans-serif;
        }
        .container{
            width: 100%;
            padding:25px;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .border{
            border:2px solid #1DA1F2;
            padding: 50px 70px;
        }
        .heading{
            text-align: center;
        }
        .heading .logo a{
            font-size:35px;
            color:#000066;
            font-weight:700;
        }
        .heading .logo h3{
            margin-top:8px;
            color:#2C3E50;
            font-weight:700;
        }
        .d-flex{
            display: flex;
        }
        .justify-content{
            justify-content:space-between;
        }
        .center{
            align-items:center;
        }
        .donationSlipDody{
            margin-top:25px;
        }
        .donationSlipDody .donate_info_heading ul li{
            padding-bottom:5px;
            font-size:18px;
            color:#6A6A6A;
            font-weight:500;
        }
        .donationSlipDody .donate_info ul li{
            padding-bottom:5px;
            font-size:18px;
            color:#2C3E50;
            padding:0px 0px 5px 10px;
            font-weight:700;
        }
        .footer{
            margin-top:25px;
            border-top:1px solid #1DA1F2;
            padding:25px;
        }
        .footer .logo{
            text-align:center;
        }
        .footer .logo a{
            font-size:25px;
            color:#1DA1F2;
            font-weight:700;
        }
        .footer .logo p {
            padding:2px 0px;
            color: #
        }
        .footer .logo p  i{
            color:#1DA1F2;
        }
        .footer .logo p a{
            font-size:18px;
        }
        .print{
            margin-top:10px;
            margin-bottom:10px;
        }
        .print .btn{
            padding:10px;
            background-color:#1DA1F2;
            color:#FFFFFF;
            border:none;
            outline:none;
            border-radius:5px;
            cursor:pointer;
        }
        .pl-2{
            padding-left:20px;
        }
    </style>
</head>
<body>
    <!-- Donation Slip -->
        <div class="container d-flex">
            <div class="print">
                <a href="index.php"><button type="button" class="btn">Back</button></a> <button type="button" class="btn pl-2" onclick="window.print()">Print Slip Now</button>
            </div>
            <div class="border">
                <div class="heading">
                    <div class="logo">
                        <a href="index.php"><i class="fas fa-hands-helping"></i> <span>NGO</span></a>
                        <h3>Thank You For Your Constribution !</h3>
                    </div>
                </div>
                <div class="donationSlipDody d-flex justify-content center">
                    <div class="donate_info_heading">
                        <ul>
                            <li>
                                Donation Id : 
                            </li>
                            <li>
                                Payment Id : 
                            </li>
                            <li>
                                Payment Status : 
                            </li>
                            <li>
                                Name : 
                            </li>
                            <li>
                                Email-id : 
                            </li>
                            <li>
                                Contact Number :
                            </li>
                            <li>
                                Donation Amount : 
                            </li>
                            <li>
                                Payment Time :
                            </li>
                        </ul>
                    </div>
                    <div class="donate_info">
                        <ul>
                            <li>
                                <?php echo $data['id']; ?>
                            </li>
                            <li>
                                 <?php echo $data['payment_id']; ?>
                            </li>
                            <li>
                                <?php echo $data['payment_status']; ?>
                            </li>
                            <li>
                                <?php echo $data['name'] ?>
                            </li>
                            <li>
                                <?php echo $data['email'] ?>
                            </li>
                            <li>
                                <?php echo $data['phone'] ?>
                            </li>
                            <li>
                                <?php echo $data['amount'] ?> &#8377;
                            </li>
                            <li>
                                <?php echo date("d F Y h : i : s", strtotime($data['added_on'])) ?>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer">
                    <div class="logo">
                        <p><a href="#">https://ngo.com</a></p>
                        <p><i class="fas fa-map-marker-alt"></i> <span>12, Pune, Maharastra, India</span></p>
                        <p><i class="fas fa-phone-volume"></i> <span>+91 0000 00000</span></p>
                        <p><i class="far fa-envelope"></i> <span>example@ngo.com</span></p>
                    </div>
                </div>
            </div>
            <div class="print">
                    <button type="button" class="btn" onclick="window.print()">Print Slip Now</button>
            </div>
        </div>
    <!-- Donation Slip -->
</body>
</html>
