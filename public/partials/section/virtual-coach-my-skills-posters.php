<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://labgenz.com/
 * @since      1.0.0
 *
 * @package    Virtual_Coach
 * @subpackage Virtual_Coach/public/partials
 */

 $coach_id = Virtual_Coach_Utils::get_current_user_virtual_coach();
 $coach_gender = Virtual_Coach_Utils::get_coach_gender($coach_id);
 
?>

<div class="vc-my-skills-posters">
 
 <div class="vc-section-content-header">
  <div class="vc-sch-text">
   <div class="vc-sch-text-top"><?php _e('My Skills Posters',  $plugin_name) ?></div>
   <div class="vc-sch-text-bottom"><?php _e('Add My Skills Posters', $plugin_name) ?><i data-gender="<?php echo esc_attr($coach_gender); ?>" class="vc-icon-volume-up speak"></i></div>
  </div>
 </div>
 
 <div class="vc-section-content-body">
  
  <div class="vc-masonry-bloc">
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/4221/a410/71db728505e3d2a7d8e7ebcb3b8aff02?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=LV-inB-8y9tQOACnBkeTIdIlTPn7ppg8Szve0gvU3y1-bCFHTnbgAUV2KzmCaWexDxIDlW9MOKs~earir9-K21Jy0yTMs1wiQ8x5O9GjLndjLHFPu7KGeJ1aVmDeYdU5nR2wrnKg8DkI2EMPFd6uRF3oH4i2gVzNypRUeIlaKoIFT6hW7sL8ypKYZ2l2MYOM29WhkJgSU6EF38hZTDu3p0ufQGTcYaVhPEr23UP~Fl80bFIQX2PC9Fw9kB-KxaoEPdoOyA76c720XCA6-x3sBo3FeWjSRRrrlHFvILsHgzNtt8dfoV-svjyIlwrWXn3Qk8whqTU19msCjK0J3ih2eg__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/82c2/2f65/8b68be63acea54d03e29b01a9deb1377?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=XVLUqLeMOGbY0B7gKSzCmH4~W6X0U0yNtnK5xYJrYhS31hAoyfk9OG8eKvyw2dgpwb-vVvCt5tQ1~asaGl2ZfKoJHGU9ZbhN~UWCxyXXf6iQkjMRs~0iAEh6dU79~XZdVVWxpnc52r5P5QOAgTjeRZgR44IiN9bgNhSFeMAot6iS5cCqTWom6OlP-wHCp0HBF0VhOhu67~mB8Pp1eJy62~8xN1~kQbcQPIA3akQsgP2Q8HLKtcuveTKWuJo9Vhb2cREJKler4tgTq4UtCDO~tKLOJFF06VAD20Ojl4IkdU8xhnhcOHAl5Ry7XwBwxL0bOGd0CMZobsSNgrRegpOoHg__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/c8ba/9b27/3a5e8d089e4edb8522194e35f83e150e?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=SmlrAz6XO02~o-XiwkvoYwzTlPjjTGsyzdmGYGk70Op7A4xZtyENqBM1k1KeAvBstav-0rEUoX8ViZXZBa0S5RTLBAhDfrRO17p13NIXRy~PphoZGCMhW8ohOlTjaQUM9Cnu4U0XYplUHK73Ee7wOnQhMAkocRcmdjlY7~bU0xOKzW2MFVTagff9NzyvKu2gk9iqdQwLvRH9AJu0n1AroW~3-tRApaKUR9JB~ZNewy8LSGAOi5ggaCHvzeR7JnplParFGnlgHYuks-r9iiXa6~ayL5tV-7soWXECXwYoax7BzdrlTRwOcEkiFJCazqNxdMMPk9Rwjw2S0z57xY3BiQ__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/cbc4/23c7/027ab1659f831231a3898216b2955cdf?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=UYEl2j5aK5zz3ZjFdOHL4pE9z7PLMCWuR-taVCepnha~gmucc7s-SL~O1plj5s3hlyl79J7as4Ie~HYkWRHhkR8flHKz4V9vT4R-u-ZQJr4TrriRRJzxeIc3vCO4f16cujzOMywIm3Gi-HvcgmIf7qsyjkCjFI3jL77Ja1C-e~uE0PUy40p4gnjfphHeh1H5zRphCLziyvq940U8GSFCn3mXF7NK4OsL6Klcip151yPdxTvECC00SP-X6qiKYJ2vOYgJOPm7s~8wmyI~4FTIthOdhOs9lNwxr7vnJlwA1yX~480DDBSkFfo1izZctlvMYBhtuX9Hh6xZ~S-I4tA5LA__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/8488/b644/248d041cf295a3aee62bba59e5b4f6a2?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=qbrP1fyIY9CWWgB8OmO8NkT4xc-1dJzjzi4rZkYFmSk-ZEEdtcy7tLO-oid1fiG9UPUn~amyrOts8GX8s1po~EfZKxa6TO8wWBGu0wEQJ0-1tnHKZwtlbDvsVGpy3dX4dJheVNyIwkkQjKvmV-O1CYNXBnB1Aemd6WdV27wYGupdKIiXgAEHZAH7f2ieuAPf3HZav5vyDwoP7WMWarYxntAEy2nWLEHGSQM~VjjxOA23rm1g6B8sEMhoY3PqPu-gbtHoTeUa0MuafQcVuxZODRq8iC5ZI2bV6hNNHh4z8qQyZS0V8nnLJpEaJYl~bH6FFe35wsxmkfVRx6VYOuyisw__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/3c00/7e2a/fd8ea2dfd83b94e814dfd81863abc626?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=VVC03q~3J~CaUQYtjqihh4a0B~opCw6O23Rw27Wn1U8nmR6-EPgCiJVHBKM5jxssEbc~CwkD9Mg6X-3J4e7UmDlgRhV0gizewden6eMTN9gnI8~1AuiPwYpm0OOGpF3Pg9VKkl2WGeI8Zozzp27A-kTEpQJYoaBfk4bud2oa5tw04vGYdtioTJprFMOy63rqIylb~v1W2Wf54H5NSsUgqFb7nt24MmQNw2K6NLmw36LaEiRKtf6I~sixevVIhtw3Mr6btQrlezrDN8Bz8qWBuf~84Q3O~lJJuCm6cI3LJEs1mReZQ2IxSryGtBeD37EI5X16GjwD-8YvJdO-fmZ~mg__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/f69c/48b9/8a31c6f36733d5547acca7e1f28b1520?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=dMtE6oAlZbr6Fc5HgrohuWK59XjFBVxXKUfJeMPDjkJ8EqdHydhXwkY56WhLhKNaLVQmhSuk0KuoVVtMZJKDEUAAjUPX6vP0db7Gpcz0gZ52nzqRPiXEhX08MIgKO-g0ZJjXRkhcsNDihkDAUH6WBdOMI3SHiTjjUkuSLX7l0tOLft5eclNzieckmKMN0sUpIneeaVT3POiSX4H90LRpQ3c12LmukoaLnsUC1LUphdGnjGhx-QpfZCKlsz22M-Ah0mr3IUfnGRmuPpBVoNgv7K-Api9HX3cR6NkFRsQrS1KtTnzfPVSmPA9FtC1WhUm1J89H9GKU2oC9xwqaZXMTgA__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/7632/a7b1/3e65f4b4b53a6ddc02a667ed28ddb5c6?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=MPVwdij4~f9BTRlu343Sh-ScFSzj9QnOKCYK95Om2L4nN429nQtrxCioejZkG9PO6DynBXYVHDwiaYXZEPJemZVnxq9O7VgwC9IsSWQPqQT9hFEU5u5EG0EDOji3g~ze1OO2xmNBN006sEWyjWSLlQgxmZ--ulCCKHW40zcmccJxXABpNZOxfknfSdWuUFQNujS3zt7mJupBcXMSH7AcLWG0EDj8mNqAxNuk2eKnxMLCcW4nQ9Gvf7ZK9pobrI~9rUr-RdYoHfh2XFVh4lNr5GLrsc2PYTxJR84qletFulqwfVaE84heYjvBBHrz6wD9pxotgtKzYnWb3yLfNGLjgQ__">
   </div>
   
   <div class="vc-masonry-bloc-img">
    <img src="https://s3-alpha-sig.figma.com/img/3d57/b930/0ddbeaec0c755b68b55b7817a683e67d?Expires=1738540800&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Ao6LMoBlDvb~zBeyFbBdiXFnx8DRG3YgDI3he9kxVnBZUyYeUtfYqt-ACl-c~rTlKsTBf25ET4Mtt5KAguo9e4mjDVVuGhtP7n8-Gonq-nxGhHMzpYlakTrHiVzc-efQ6o5O5Lix9rSqiDtni7k3CBYNOrpYynKnd9Vm0tszHkrTm9Dt1wmrmmFLAXNhM0OxrdqxFH3fthGDP-uT7TkN58RpANZCqDqUeM-PkFIrFU3n-D3eTEAAEB3F~1JRltHoYPS23loThR6-X9JOAOZLubjLcDejChvsjK6k~PzDSfewgfohDt230gKwNSmJfuC1qVEKOwBaK3IwV9cGxSu5KA__">
   </div>
   
  </div>
 </div>
 
</div>