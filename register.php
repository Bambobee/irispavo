  <?php include 'root/process.php';  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css" />
    <style>
        .login_section {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(#022266c5, #022266c5), url("img/property-2.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            position: relative;
        }

        .login_container {
            width: 800px;
            height: auto;
            
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border-radius: 10px;
            display: grid;
            grid-template-columns: 1fr 1fr;

            .login_image {
                background: transparent;
                backdrop-filter: blur(15px);
                border: 1px solid #fff;
                width: 102%;
                height: 100%;
                border-radius: 10px;
                border-top-right-radius: unset;
                border-bottom-right-radius: unset;
                
                padding: 3%;
                color: #fff;
                align-items: center;
                h2{
                    font-size: 30px;
                    text-align: center;
                }
                span{
                    color: #000;
                }
                .login_register{
                    width: 90%;
                    img{
                        width: 100%;
                    }

                }
            }

            .login_forms {
                border-radius: 10px;
                padding: 5px;
                background-color: #ffffffe7;
                .logo {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    padding-top: 15px;

                    img {
                        width: 100px;
                    }
                }

                .heading_words {
                    text-align: center;
                }

                form {
                    width: 350px;
                    margin: 0 auto;
                    padding: 15px;

                    .bx {
                        font-size: 20px;
                        color: #fff;
                    }

                    label {
                        font-size: 16px;
                        font-weight: 600;
                    }

                    .forgot {
                        a {
                            text-decoration: none;
                            color: #022266;
                            font-size: 14px;
                        }
                    }
                    .input-group-text{
                        background-color: #022266 !important;
                    }
                }
            }
        }
        @media (max-width: 900px){
            .login_container{
                display: block !important;
                width: 450px;
            }
          .login_image{
            display: none !important;
          }
        }
        @media (max-width: 500px){
            .login_container{
                width: 90% !important;
                padding: 2% !important;
                .login_forms{
                    background-color: #fff !important;
                }
                form{
                    width: 95% !important;
                    margin: 0 auto !important;
                    .bx {
                        font-size: 15px !important;
                        color: #fff;
                    }

                }
            }
        }
    </style>
</head>

<body>
    <section class="login_section">
        <div class="login_container">
            <div class="login_image">
                <div class="login_header_left">
                    <h2>Registration Form</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cum omnis tempore eos voluptatem </p>
                </div>

                <div class="login_register">
                    <img src="./img/signup.png" alt="">
                </div>
            </div>
            <div class="login_forms">
                <div class="logo">
                    <img src="img/logo.png" alt="">
                </div>
               

                <form action="" method="post">
                
                    <label for="" class="form-label">Full Name</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class='bx bx-user'></i></span>
                        <input type="text" name="name" class="form-control" placeholder="Enter your Email." aria-label="Username"
                            aria-describedby="basic-addon1" required>
                    </div>
                    <label for="" class="form-label">Email</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1"><i class='bx bx-envelope'></i></span>
                        <input type="email" name="email" class="form-control" placeholder="Enter your Email." aria-label="Username"
                            aria-describedby="basic-addon1" required>
                    </div>
                    <label for="" class="form-label">Status</label>
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01"><i class='bx bx-building-house'></i></label>
                        <select class="form-select" name="usergroup" id="inputGroupSelect01" required>
                            <option value="Brocker">Broker</option>
                            <option value="Property Owner">Property Owner</option>
                        </select>
                        </div>
                    <label for="" class="form-label">Password</label>

                    <div class="input-group mb-2">
                        <span class="input-group-text"><i class='bx bx-lock-alt'></i></span>
                        <input type="password" name="password" id="password_input" class="form-control" placeholder="Enter your Password."
                             required>
                        <span class="input-group-text"><i id="show" class='bx bx-show'></i></span>
                    </div>

                

                    <div class="mb-3 mt-3" style="width: 100%;">
                        <button class="btn" name="register_bocker" style="background: #022266; width: 100%; color: #fff;">Register</button>
                    </div>

                    <div style="text-align: center;">Don't have an account <a href="./login" style="text-decoration: none;
                    color: #022266;">Login</a></div>
                </form>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/dist/boxicons.js"></script>

    <script>
        const passwordShow = document.getElementById('password_input');
        const showPassword = document.getElementById('show');

        showPassword.addEventListener('click' , () =>{
            if(passwordShow.type === 'password'){
                passwordShow.type = 'text';
                showPassword.classList.remove('bx-show');
                showPassword.classList.add('bx-hide');
            }else{
                passwordShow.type = 'password';
                showPassword.classList.remove('bx-hide');
                showPassword.classList.add('bx-show');
            }
        })
    </script>
</body>

</html>