<?php
    include "init.php";
    include 'System/Class/Admin.php';
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $formErrors = [];
        if(empty($_POST['name'])){
            $formErrors['name'] = 'Name Can\'t be Empty';
        }
        if(empty($_POST['email'])){
            $formErrors['email'] = 'Email Can\'t be Empty';
        }
        if(empty($_POST['mobileNo'])){
            $formErrors['mobileNo'] = 'Mobile Number Can\'t be Empty';
        }
        if(empty($_POST['Description'])){
            $formErrors['Description'] = 'Description Can\'t be Empty';
        }
        if(empty($formErrors)){
            $name           = filter_var(($_POST['name']),FILTER_SANITIZE_STRING);
            $email          = filter_var(($_POST['email']),FILTER_SANITIZE_EMAIL);
            $mobileNo       = filter_var(($_POST['mobileNo']),FILTER_SANITIZE_STRING);
            $Description    = filter_var(($_POST['Description']),FILTER_SANITIZE_STRING);
            if($contact->addContact($name,$email,$mobileNo,$Description)){
                echo "<script>alert('Messages Sent Successfully, Thanks for your Contact')</script>";
            } else {
                $success = false;
            }
        }
    }
?>
    
    <div class='container contact'>
        <?php if(isset($success)) echo "<h3 style='color:red'>Something went Wrong</h3>"; ?>
        <div class='row'>
            <div class='col-sm-4'>
                <h2>Hospital Address:</h2>
                <p>500 Lorem Ipsum Dolor Sit,22-56-2-9 Sit Amet, Lorem,India</p>
                <p>Phone:(00) 222 666 444</p>
                <p>Fax: (000) 000 00 00 0</p>
                <p>Email: <u style='color:#000'>info@mycompany.com</u></p>
            </div>
            <div class='col-sm-8'>
                <h2>Contact Us</h2>
                <form class='form-horizontal' action="<?php echo $_SERVER['PHP_SELF']; ?>" method='POST'>
                    <div class='form-group'>
                        <label for="#Name">NAME</label>
                        <input type="text" name='name' id='Name' class='form-control'>
                        <?php if(isset($formErrors['name'])) echo "<span style='color:red'>".$formErrors['name'].'</span>'; ?>
                    </div>
                    <div class='form-group'>
                        <label for="#email">EMAIL</label>
                        <input type="text" name='email' id='email' class='form-control'>
                        <?php if(isset($formErrors['email'])) echo "<span style='color:red'>".$formErrors['email'].'</span>'; ?>
                    </div>
                    <div class='form-group'>
                        <label for="#mobileNo">MOBILE.NO</label>
                        <input type="text" name='mobileNo' id='mobileNo' class='form-control'>
                        <?php if(isset($formErrors['mobileNo'])) echo "<span style='color:red'>".$formErrors['mobileNo'].'</span>'; ?>
                    </div>
                    <div class='form-group'>
                        <div class="contact-us-desc md-form mb-4 pink-textarea active-pink-textarea">
                            <label for="form18">Description</label><br>
                            <textarea name='Description' id="form18" class="md-textarea form-control" rows="5"></textarea>
                            <?php if(isset($formErrors['Description'])) echo "<span style='color:red'>".$formErrors['Description'].'</span>'; ?>
                        </div>
                    </div>
                    <div class='form-group'>
                        <input type="submit" class="btn btn-blue" value='Send'>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include $tpl."footer.php"; ?>