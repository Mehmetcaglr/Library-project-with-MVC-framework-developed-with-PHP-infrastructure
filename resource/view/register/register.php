<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>CodePen - Glassmorphism login Form Tutorial in html css</title>


</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!--Stylesheet-->
    <style media="screen">
        *,
        *:before,
        *:after{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #080710;
        }
        .background{
            width: 430px;
            height: 620px;
            position: absolute;
            transform: translate(-50%,-50%);
            left: 50%;
            top: 50%;
        }
        .background .shape{
            height: 200px;
            width: 200px;
            position: absolute;
            border-radius: 50%;
        }
        .shape:first-child{
            background: linear-gradient(
                    #1845ad,
                    #23a2f6
            );
            left: -80px;
            top: -80px;
        }
        .shape:last-child{
            background: linear-gradient(
                    to right,
                    #ff512f,
                    #f09819
            );
            right: -30px;
            bottom: -80px;
        }
        form{
            height: auto;
            width: 400px;
            background-color: rgba(255,255,255,0.13);
            position: absolute;
            transform: translate(-50%,-50%);
            top: 50%;
            left: 50%;
            border-radius: 10px;
            backdrop-filter: blur(10px);
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 50px 35px;
        }
        form *{
            font-family: 'Poppins',sans-serif;
            color: #ffffff;
            letter-spacing: 0.5px;
            outline: none;
            border: none;
        }
        form h3{
            font-size: 32px;
            font-weight: 500;
            line-height: 42px;
            text-align: center;
        }

        label{
            display: block;
            margin-top: 30px;
            font-size: 16px;
            font-weight: 500;
        }
        input{
            display: block;
            height: 50px;
            width: 100%;
            background-color: rgba(255,255,255,0.07);
            border-radius: 3px;
            padding: 0 10px;
            margin-top: 8px;
            font-size: 14px;
            font-weight: 300;
        }
        ::placeholder{
            color: #e5e5e5;
        }
        button{
            margin-top: 50px;
            width: 100%;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 5px;
            cursor: pointer;
        }
        .social{
            margin-top: 30px;
            display: flex;
        }
        .social div{
            background: red;
            width: 150px;
            border-radius: 3px;
            padding: 5px 10px 10px 5px;
            background-color: rgba(255,255,255,0.27);
            color: #eaf0fb;
            text-align: center;
        }
        .social div:hover{
            background-color: rgba(255,255,255,0.47);
        }
        .social .fb{
            margin-left: 25px;
        }
        .social i{
            margin-right: 4px;
        }

    </style>
</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
<form method="post" action="http://localhost:9000/register/form">
        <h3>Register Now</h3>

        <?php if(count(error())>0): ?>
            <div class="col-md-12">
                <div class="alert">
                    <?php foreach (error() as $error ): ?>
                        <div class="alert alert-danger"><?php echo $error ?></div>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif; ?>


        <label for="name">Username</label>
        <input type="text" placeholder="Name" name="name" id="name">

        <label for="email">UserMail</label>
        <input type="text" placeholder="Email" name="email" id="email">

        <label for="phone">Phone Number</label>
        <input type="number" placeholder="Email or Phone" name="phone" id="phone">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" name="password" id="password">

        <label for="confirmed_password">Password Again</label>
        <input type="password" placeholder="Password Again" name="confirmed_password" id="confirmed_password">

        <button>Sign In</button>
        <p>have a count, <a href="http://localhost:9000/login">login now</a></p>



    </form>


</body>
</html>
<!-- partial -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>

