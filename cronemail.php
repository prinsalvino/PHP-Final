<?php
$to_email = "622796@student.inholland.nl";
$subject = "Make Report Reminder";
$message = "Dont forget to make your monthly report";
$header = "From: noreply@student.inholland.nl";
mail($to_email,$subject,$message,$header);

?>