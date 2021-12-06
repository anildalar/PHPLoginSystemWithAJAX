<?php 
    //1. DB Connection Open
    $conn = mysqli_connect('localhost','root','','ecom2_db') or die('Could not connect');

    //echo 'Hello from api';

    //Check for the formdata is comming or not
    //var_dump($_REQUEST)
    if( (isset($_REQUEST['action'])) && ($_REQUEST['action']=='logindata')  ){
        //YEs formdata is comming
        //echo 'YEs login data is comming';

        //Always filter/Sanitize the incomming data
        $email = mysqli_real_escape_string($conn,$_REQUEST['email']);
        $password = mysqli_real_escape_string($conn,$_REQUEST['password']);

        //get the salt

        //2. Build the query
        $sql = "SELECT `salt` FROM users_tbl WHERE email='$email'";


        //3. Execute the query
        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));


        //get the single row
        //mysqli_fetch_row(result)
        $row = mysqli_fetch_row($result);

        //var_dump( $row);

        //row > 0 mean user is available
        if($row !== NULL){
            //echo 'User is available';
            //var_dump($row[0]); // index number //'salt' key
            $salt = $row[0];

            $pass_hash = hash('sha512', $salt.$salt.$password.$salt );            

            //2. Build the query
            $sql = "SELECT * FROM users_tbl WHERE email='$email' AND password='$pass_hash'";


            //3. Execute the query
            $result = mysqli_query($conn,$sql) or die(msyqli_error($conn));

            //check the NOR = Number of rows
            //mysqli_num_rows(result);

            //var_dump(mysqli_num_rows($result));
             if(mysqli_num_rows($result) > 0 ){
                 //Login and password are correct
                 echo '200';

            } else{
                echo '403';//unauthorized
            }
            //mysqli_fetch_row()


            //4. Display the result
        }else{
            echo '404';
           
        }


        //4. Display the result

    }


    //5. DB Connection Close
    mysqli_close($conn);
?>