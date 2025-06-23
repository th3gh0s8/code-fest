<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    </head>
    <body>
        <?php include 'header.php'; ?>
        <div style="width: 100%;height: 100vh;">
            <div style="width: 40%;height: 100vh; background-color: blueviolet">

                <h1 style="color: white;
                    padding-top: 20px;
                    padding-left: 20px;
                    ">How it works?</h1>
                <br>
                <table border="0">


                    <tr>

                        <td><p style="color: white">Upload prescription</p></td>
                    </tr>
                    <tr>

                        <td><p style="color: white">Complete order by confirming the prescription quote</p></td>
                    </tr>
                    <tr>

                        <td><p style="color: white">Get it delevered to your door step</p></td>
                    </tr>

                </table>
                <br>
                <div style="margin-left: 15px;width: 500px; height: 200px; background-color: white">
                    <h2>UPLOAD YOUR PRESCRIPTION FOR A FREE QUOTE</h2>
                    <h3 style="color: red">All island delivery available</h3>
                    <p>please upload clear images of the whole prescription partial prescription images will not be proccessed</p>
                </div>


            </div>
            <div  style="width: 60%;height: 100vh; background-color: bisque;margin-left: 40%;margin-top: -100vh;">
                <br><br> <div style="margin-left: 170px;padding-top: 50px;width: 500px; height: 600px; ">
                    <table border="0">
                        <form action="action/orderAct.php" method="post" enctype="multipart/form-data">
                            <tbody>
                                <tr>
                                    <td> phone number</td>
                                    <td><input type="text" name="mobile" value="" /></td>
                                </tr>
                                <tr>
                                    <td>email</td>
                                    <td><input type="text" name="email" value="" /></td>
                                </tr>
                                <tr>
                                    <td>name</td>
                                    <td><input type="text" name="name" value="" /></td>
                                </tr>
                                <tr>
                                    <td>address</td>
                                    <td><input type="text" name="address" value="" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>note</td>
                                    <td><textarea name="note" >
                                        </textarea></td>
                                </tr>
                                <tr>
                                    <td>upload prescription</td>
                                    <td><input type="file" name="pres_image" value="" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="submit" value="Upload" /></td>
                                </tr>
                            </tbody>
                    </table>
                    </form>

                </div>
            </div>

    </body>
</html>
