<?php

namespace App\Modules;


class AddSkypeField extends Module
{
    /**
     * Add hooks for module
     */
    public function init()
    {
        add_action('register_form', [$this, 'showSkypeField']);
        add_action('register_post', [$this, 'checkFields'], 10, 3);
        add_action('user_register', [$this, 'registerExtraFields']);
    }

    /**
     * Show skype field
     */
    public function showSkypeField()
    {
        ?>
        <p>
            <label>Skype<br/>
                <input id="skype" type="text" tabindex="30" value="<?php echo $_POST['skype']; ?>" name="skype" />
            </label>
        </p>
        <?php
    }

    /**
     * Check fields
     *
     * @param $login
     * @param $email
     * @param $errors
     */
    public function checkFields($login, $email, $errors)
    {
        global $skype;
        if($_POST['skype'] == '') {
            $errors->add( 'empty_realname', "<strong>ERROR</strong>: Please Enter your skype handle" );
        }
        else {
            $skype = $_POST['skype'];
        }
    }

    /**
     * @param $userId
     * @param string $password
     * @param array $meta
     */
    public function registerExtraFields($userId, $password = "", $meta = [])
    {
        update_user_meta($userId, 'skype', $_POST['skype']);
    }
}