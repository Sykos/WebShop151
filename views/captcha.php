The CAPTCHA  is a very very useful test to prevent abuse on the websites. When you create a web form like registration, login, contact us, blog comment etc..., We are suffering day by day with unwanted email or web spam abuse. So if you use CAPTCHA on your website forms, this can help in stopping Guestbook Spam, Blog Spam, Wiki Spam, Comment Spam, Feedback Form Spam, Other Types of Web Form Spam.

The goal of this tutorial is to demonstrate how to make your own simple CAPTCHA protection using PHP. For this we needed to enabled gd library, you can create a captcha code for your registration form or any web forms using PHP.

Create a one php page like: php-captcha.php & paste all the below PHP code in that file.

session_start();

if(isset($_SESSION['captcha']))
{
unset($_SESSION['captcha']);
}



The above PHP code represent to  start session and clear the old captchaâ€™s session value if it set.

$num_chars=6;//number of characters for captcha image
$characters=array_merge(range(0,9),range('A','Z'),range('a','z'));//creating combination of numbers & alphabets
shuffle($characters);//shuffling the characters

The above code describes the number of captcha characters which will dispaly as a image and total available characters, here I am only using all the lower and upper case alphabets and all numerics. Then we shuffle the characters.


//getting the required random 5 characters
$captcha_text="";
for($i=0;$i<$num_chars;$i++)
{
$captcha_text.=$characters[rand(0,count($characters)-1)];
}

$_SESSION['captcha'] =$captcha_text;// assigning the text into session

Here we will needed to generated the required captcha code in a random manner from the available character array, also It assigns the value to session variable.

header("Content-type: image/png");// setting the content type as png
$captcha_image=imagecreatetruecolor(140,30);

$captcha_background=imagecolorallocate($captcha_image,225,238,221);//setting captcha background colour
$captcha_text_colour=imagecolorallocate($captcha_image,58,94,47);//setting cpatcha text colour

imagefilledrectangle($captcha_image,0,0,140,29,$captcha_background);//creating the rectangle

$font='Arial.ttf';//setting the font path

imagettftext($captcha_image,20,0,11,21,$captcha_text_colour,$font,$captcha_text);
imagepng($captcha_image);
imagedestroy($captcha_image);