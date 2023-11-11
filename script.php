<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Security System</title>
</head>

<body>
    <div class="container">
        <div class="card card-outline card-primary">
            <div class="card-header text-center bg-info">
                <h4><b>Caesar Cipher</b></h4>
            </div>
            <div class="card-body bg-warning">
                <?php
                // Function to perform Caesar Cipher on a character
                function cipher($char, $key)
                {
                    if (ctype_alpha($char)) {
                        $baseValue = ord(ctype_upper($char) ? 'A' : 'a');
                        $charCode = ord($char);
                        $mod = fmod($charCode + $key - $baseValue, 26);
                        $resultChar = chr($mod + $baseValue);
                        return $resultChar;
                    } else {
                        return $char;
                    }
                }

                // Function to encrypt a given input using Caesar Cipher
                function encrypt($input, $key)
                {
                    $output = "";
                    $characters = str_split($input);
                    foreach ($characters as $char) {
                        $output .= cipher($char, $key);
                    }
                    return $output;
                }

                // Function to decrypt a given input using Caesar Cipher
                function decrypt($input, $key)
                {
                    return encrypt($input, 26 - $key);
                }
                ?>

                <!-- Form for user input -->
                <form name="securityForm" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="plain" class="form-control" placeholder="Input Text">
                    </div>
                    <div class="box-footer">
                        <table class="table table-stripped">
                            <tr>
                                <td><input class="btn btn-success" type="submit" name="encrypt" value="Encrypt" style="width: 100%"></td>
                                <td><input class="btn btn-danger" type="submit" name="decrypt" value="Decrypt" style="width: 100%"></td>
                            </tr>
                        </table>
                    </div>
                </form>
            </div>

            <!-- Display the result of encryption/decryption -->
            <div class="card-header text-center bg-info">
                <h4><b>RESULT</b></h4>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <td> Output : </td>
                        <td><b>
                                <?php if (isset($_POST['encrypt'])) {
                                    echo encrypt($_POST['plain'], 6); // Using a shift key of 6
                                }
                                if (isset($_POST['decrypt'])) {
                                    echo decrypt($_POST['plain'], 6); // Using a shift key of 6
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Entered Text : </td>
                        <td><b>
                                <?php if (isset($_POST['encrypt']) || isset($_POST['decrypt'])) {
                                    echo $_POST['plain'];
                                } ?></b></td>
                    </tr>
                    <tr>
                        <td>Shift Key : </td>
                        <td><b>6</b></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
<style>
    body {
        background-color: #a9a9a9;
    }

    .container {
        width: 40%;
        margin: 87px auto;
    }
</style>
