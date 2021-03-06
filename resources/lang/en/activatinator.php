<?php
return [

	/*
    |--------------------------------------------------------------------------
    | Activatinator Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are the default lines which match reasons that
    | are given by the activation broker for an activation attempt that has
    | failed, such as for an invalid token or a login by an unverified user.
    |
    */

    'activate' => 'Your account is now active! Log in now to activate your Codepunk account.',
    'active' => 'Your account is now active!',
    'inactive_user' => 'You need to activate your account. We sent you an activation code when you registered. ' .
        'Please check your email.',

    // NOTE: Although the below message results from no user with the supplied email being found, we don't want to
    // disclose whether a given email exists in our system. So whether an activation link was sent or not, we'll
    // show the same message.
    'not_sent' => 'An activation code has been sent! Please check your email.',

    'sent' => 'An activation code has been sent! Please check your email.',
    'token' => 'This activation token is expired or is invalid.',

    'email.subject' => 'Activate Your Codepunk Account',
	'email.reason' => 'You are receiving this email because you registered a new account using this email address.',
	'email.action' => 'Activate Account',
	'email.disclaimer' => 'If you did not register a new account, no further action is required.',
];
