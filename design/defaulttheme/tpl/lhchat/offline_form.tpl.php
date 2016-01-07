                    <div id="form">
                    <form method="post" name="contact_form" >
 

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label><br/>
                                    <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter name" required="required">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label><br/>
                                    <input type="email" class="form-control" id="femail" name="femail" placeholder="Enter email" required="required">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label><br/>
                            <textarea class="form-control" id="fmsg" name="fmsg" rows="3" required="required"></textarea>
                        </div>

                        <button type="submit" name="submit" class="btn tf-btn btn-default pull-left">Send</button>
                    </form>
                        </div>

                        
<?php
require_once "PHPMailer-master/PHPMailerAutoload.php";
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;

$mail->Username = "sajawals93@gmail.com";
$mail->Password = "impossibl";

$mail->AddAddress("talha5389@gmail.com");
$mail->Subject = "Check";
$mail->Body  = "This";
$mail->Send();
?>

