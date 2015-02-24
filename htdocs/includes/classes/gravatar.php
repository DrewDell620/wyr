<?php  

$result = query("SELECT * FROM users WHERE user_id=$id");

$user_email = $result[0]["user_email"];
/**
     * @var string $user_gravatar_image_url3 The user's gravatar profile pic(large) url (or a default one)
     */
    public $user_gravatar_image_url3 = "";
    /**
     * @var string $user_gravatar_image_tag3 The user's gravatar profile pic(small) url with <img ... /> around
     */
    public $user_gravatar_image_tag3 = "";

        if ($this->isUserLoggedIn() == true) {
            $this->getGravatarImageUrl3($user_email);
        }

    public function getGravatarImageUrl3($email, $s = 250, $d = 'mm', $r = 'g', $atts = array() )
    {
        $url3 = 'http://www.gravatar.com/avatar/';
        $url3 .= md5(strtolower(trim($email)));
        $url3 .= "?s=$s&d=$d&r=$r";

        // the image url (on gravatarr servers), will return in something like
        // http://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=80&d=mm&r=g
        // note: the url does NOT have something like .jpg
        $this->user_gravatar_image_url3 = $url3;

        // build img tag around
        $url3 = '<img src="' . $url3 . '"';
        foreach ($atts as $key => $val)
            $url3 .= ' ' . $key . '="' . $val . '"';
        $url3 .= ' />';

        // the image url like above but with an additional <img src .. /> around
        $this->user_gravatar_image_tag3 = $url3;
    }
?>