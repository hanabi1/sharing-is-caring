<?php        
        //"facebook" doesnt work?

        $callbackURI = URL . 'profile/callbackhandler';
        echo '
        <script type="text/javascript">
            var _oneall = _oneall || [];
            _oneall.push(["social_login", "set_callback_uri", "' . $callbackURI . '"]);
            _oneall.push(["social_login", "set_providers", ["github"]]);
            _oneall.push(["social_login", "do_render_ui", "oa_social_login_container"]);
        </script>';
