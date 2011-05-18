#Did You Pass Math?
A simple wordpress comment anti-spam plugin.

##What's the current version?

*Code Version 3.1 (13 June 2006) 
*Translations added 15 Apr 2006

##What languages are does it work in?
*English
*English for K2 Theme (Thanks to Bruce McKenzie )
*Brazilian Portuguese (Thanks to Rodolpho Arruda
*Polish (Thanks to Zamber and Piotr Saweczko)
*Malay (Thanks to Zul)
*French (Thanks to Midori)
*Turkish (Thanks to H. Çagri TOPÇU)
*German (Thanks to Mitos Kalandiel)
*Italian (Thanks to Matteo Luigi Turchetto)
*Chinese Traditional  (Thanks to 探花·Tinn)
*Azeri (Thanks to Masood Entezar)
*Korean (Thanks to Considerable Seok2)
*Dutch (Thanks to Rik Samijn )
*Spanish (Thanks to Abel Oliva)
*+ others....

##Want to contribute a language?

You need to push it to me on git hub, you just need to edit the 'did_you_pass_math.php' and send it to me

Remember, thats: ('did_you_pass_math.php') NOT 'did_you_pass_math_functions.php'

##What does it do?

Asks the person making the comment to answer a simple math question.  This is intended to prove they are a human being and not some kind of robot.

e.g. What is the sum of 2 and 9?

It was 'inspired' by the system running on www.jroller.com

##How do I install it?

Like any wordpress plugin, simply unzip two files in to your wp-content/plugins directory and activate it via your plugin control panel.
The two files are
'did_you_pass_math_functions.php'
'<languagecode>/did_you_pass_math.php'
Note, both these files go to the same directory ('wp-content/plugins/')

##Does it need configuring?

No, theres nothing to configure, just pick the right file for your language.

If you want to know more, check the 'installation.txt' in the zip file

##Does it need any dependencies?

Nothing except the normal requirements of Wordpress (No GD library for instance)

##Can I contact you?

Find me here: steven.herod at gmail.com

##Does it work?

It would appear to, around 2000 downloads and no reported exploits
Theres also plenty of room to expand the idea (products, algebra, human readable numbers etc ).


##What license is it released under?

GPL but I have no objection to you making a small donation!
 
 

##What's new in 3.1?
Passes XHTML Strict validation
There was a bug with comment counting, rejected posts still incremented the comment count (if you didn't have moderation on)
You can turn off the requirement for session cookies if your users are paranoid. Default is still to use cookies for improved security

##What's new in 3.0?
Trackbacks now work
Languages are now seperated out in seperate file, not embedded in the code, check the new install instructions
Thanks to Carles Pina i Estany for the inspiration for the count fix and Steffen Rusitschka for the trackback fix

##What's new in 2.0?
Question now positions itself above the comment field (not below it)
Now validates as XHTML (Transitional) 
Special version supporting K2 theme for wordpress (Thanks Bruce!)
