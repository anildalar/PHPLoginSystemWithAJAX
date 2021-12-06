<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-6 offset-3">
            <form class="myloginform">
                <input type="hidden" name="action" value="logindata">
                <h1 class="text-center mt-5">Login System with AJAX</h1>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        //Check if the page loaded successfully
        //1. ()();
        //2. $(document).ready();
        //3. jQuery();

        //No need to check the page load
        jQuery(function($){ // $ is a reference to jquery object
            //alert('OKOKOKOKO');
            //$(selector).action();
            $('.myloginform').submit(function(e){ // e = event object
                e.preventDefault();// stop refreshing the page

                //alert('Form Submitted');

                //Collect the data

                //jQuery Seriealize Method
                //$(selector).action();
                var d = $(this).serialize();


                $.ajax({
                    url:"http://localhost/LoginSYstemWithPHPWithAJAX/api.php", //Kaha
                    type:"POST", //Kese 1. GET 2. POST
                    data: d , //Kya 
                    success:function(result,status,xhr){
                        console.log(result);
                        if(result == 200){
                            //alert('Welcome');
                            window.location.href = 'http://localhost/LoginSYstemWithPHPWithAJAX/welcome.php';
                            //swal("Good job!", "User is not available"), "error");
                        }
                        if(result == 404){
                            alert('User is not available');
                            //swal("Good job!", "User is not available"), "error");
                        }
                        if(result == 403){
                            alert('Invalid Username and Password');
                            //swal("Good job!", "User is not available"), "error");
                        }
                    }
                }); // { P:V,functions } JS Object
            });

        }); // i am calling the jquery 

    </script>
</body>

</html>