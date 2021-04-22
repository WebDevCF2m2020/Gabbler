<?php

/**
 * Description of MailStaticManager
 *
 */
class MailStaticBody {

    static public function bodySignUp(array $datas): string {
        return ' <html lang="fr"> ' .
                '<body style="background-color: #F7F7F7;"> ' .
                '<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel=\"stylesheet"> ' .
                '<div style="background-color: #F7F7F7; width: 100%; height: 100%;padding: 50px 0 150px 0;font-family: \'Lato\', sans-serif; color : #4B5259;">
                        <div style="background-color: #CED4DA; width: 80%; height: auto; padding:5%; border-radius: 15px; margin:50px auto; ">
                            <h1> Welcome to <img alt="gabbler" src="' . $datas['img1'] . '" style="position:relative; top :3px;"> ' . $datas['user']['nickname_user'] . ' !</h1>
                            <br>
                            <h3 style="color : #4B5259;">To activate your account, please click on link below, you will be able to sign in.</h3>
                            <div style="margin-bottom: 45px;">
                                <a href="https://gabbler.webdev-cf2m.be/?registration&for=' . urlencode($datas['user']['nickname_user']) . '&key=' . urlencode($datas['user']['confirmation_key_user']) . '" style="text-decoration: none; color: #E41537; font-weight: 300;">https://gabbler.webdev-cf2m.be/?registration&for=' . urlencode($datas['user']['nickname_user']) . '&key=' . urlencode($datas['user']['confirmation_key_user']) . '</a>
                            </div>
                            <hr style="border-bottom: 2px solid #4B5259;">
                            <div>
                                <p style="margin:50px 0; color : #4B5259;">Gabbler is a community chat where tolerance and respect prevail. Some rules:
                                    <br><br>
                                - Be positive and helpful to other users.
                                    <br>
                                - Be respectful to everyone.
                                    <br>
                                - Don\'t spread rumors.
                                    <br>
                                - Any kind of discrimination is totally prohibited and will result in a ban.
                                    <br>
                                - Spamming is not allowed.
                                    <br>
                                - Have fun !
                                    <br>
                                    <br>
                                    <br>
                                <span style="text-decoration: none; color: #E41537; font-weight: 300;">Side note</span> : 
                                    <br><br>
                                    Your sign up nickname is <span style="font-weight: 700;">' . $datas['user']['nickname_user'] . '</span>
                                    <br><br>
                                    You can change your info at any point on your profile page, but be careful to remember your nickname and password as they are needed to sign in.
                                    </p>
                            </div>
                            <div style="text-align: center;margin: 55px auto 10px; width: 100%">
                                <p style="color : #4B5259;"> Do you need help ? Send us a message to <a href="https://gabbler.webdev-cf2m.be/" style="text-decoration: none; color: #E41537; font-weight: 300;">gabbler.com/help</a><br>
                                <a href="https://gabbler.webdev-cf2m.be/?help" target="_blank" style="position: relative; top: 10px;"><img alt="Gabbler" src="' . $datas['img2'] . '" style="transform: scale(0.5); margin: 25px;"></a>
                            </div>
                        </div>
                        <p style="font-size: 0.6em; letter-spacing: 1px; text-align: center; position: relative; bottom: 40px;">This is an automatic email, please do not reply</p>
                        </div>
                    </body>
                </html>';
    }

    static public function bodyCreateHelp(array $datas): string {
        return ' <html lang="fr"> ' .
                '<body style="background-color: #F7F7F7;"> ' .
                '<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel=\"stylesheet"> ' .
                '<div style="background-color: #F7F7F7; width: 100%; height: 100%;padding: 50px 0 150px 0;font-family: \'Lato\', sans-serif; color : #4B5259;">
                        <div style="background-color: #CED4DA; width: 80%; height: auto; padding:5%; border-radius: 15px; margin:50px auto; ">
                            <h1> Welcome to <img alt="gabbler" src="' . $datas['img1'] . '" style="position:relative; top :3px;"> ' . $datas['user']['nickname_help'] . ' !</h1>
                            <br>
                            <h3 style="color : #4B5259;">Your request for help has been sent</h3>
                            <hr style="border-bottom: 2px solid #4B5259;">
                            <div>
                                <p style="margin:50px 0; color : #4B5259;">Gabbler is a community chat where tolerance and respect prevail. Some rules:
                                    <br><br>
                                - Be positive and helpful to other users.
                                    <br>
                                - Be respectful to everyone.
                                    <br>
                                - Don\'t spread rumors.
                                    <br>
                                - Any kind of discrimination is totally prohibited and will result in a ban.
                                    <br>
                                - Spamming is not allowed.
                                    <br>
                                - Have fun !
                                    <br>
                                    <br>
                                    <br>
                                <span style="text-decoration: none; color: #E41537; font-weight: 300;">Side note</span> : 
                                    <br><br>
                                    Your sign up nickname is <span style="font-weight: 700;">' . $datas['user']['nickname_help'] . '</span>
                                    <br><br>
                                    You can change your info at any point on your profile page, but be careful to remember your nickname and password as they are needed to sign in.
                                    </p>
                            </div>
                            <div style="text-align: center;margin: 55px auto 10px; width: 100%">
                                <p style="color : #4B5259;"> Do you need help ? Send us a message to <a href="https://gabbler.webdev-cf2m.be/" style="text-decoration: none; color: #E41537; font-weight: 300;">gabbler.com/help</a><br>
                                <a href="https://gabbler.webdev-cf2m.be/?help" target="_blank" style="position: relative; top: 10px;"><img alt="Gabbler" src="' . $datas['img2'] . '" style="transform: scale(0.5); margin: 25px;"></a>
                            </div>
                        </div>
                        <p style="font-size: 0.6em; letter-spacing: 1px; text-align: center; position: relative; bottom: 40px;">This is an automatic email, please do not reply</p>
                        </div>
                    </body>
                </html>';
    }
    
    static public function bodyAdminHelp(array $datas): string {
        return ' <html lang="fr"> ' .
                '<body style="background-color: #F7F7F7;"> ' .
                '<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700&display=swap" rel=\"stylesheet"> ' .
                '<div style="background-color: #F7F7F7; width: 100%; height: 100%;padding: 50px 0 150px 0;font-family: \'Lato\', sans-serif; color : #4B5259;">
                        <div style="background-color: #CED4DA; width: 80%; height: auto; padding:5%; border-radius: 15px; margin:50px auto; ">
                            <h1> An help message is send on <img alt="gabbler" src="' . $datas['img1'] . '" style="position:relative; top :3px;"> by ' . $datas['user']['nickname_help'] . ' !</h1>
                            <br>
                            
                            <div style="margin-bottom: 45px;">
                                <p> '.urlencode($datas['user']['nickname_help']) . ' send an help message on Gabbler</p>
                            </div>
                            <hr style="border-bottom: 2px solid #4B5259;">
                            
                            <div style="text-align: center;margin: 55px auto 10px; width: 100%">
                                <p style="color : #4B5259;"> Do you need help ? Send us a message to <a href="https://gabbler.webdev-cf2m.be/" style="text-decoration: none; color: #E41537; font-weight: 300;">gabbler.com/help</a><br>
                                <a href="https://gabbler.webdev-cf2m.be/?help" target="_blank" style="position: relative; top: 10px;"><img alt="Gabbler" src="' . $datas['img2'] . '" style="transform: scale(0.5); margin: 25px;"></a>
                            </div>
                        </div>
                        <p style="font-size: 0.6em; letter-spacing: 1px; text-align: center; position: relative; bottom: 40px;">This is an automatic email, please do not reply</p>
                        </div>
                    </body>
                </html>';
    }

}
