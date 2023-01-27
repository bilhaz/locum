<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;
use App\Validation\LoginRules;

class Validation
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
        LoginRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    //--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------
        
    //public $login = [
    //    'cd_email' => 'required|max_length[50]|valid_email',
    //    'usr_pwd' => 'required|max_length[255]|validateUser[email,password]',
    //];
//
//   public $login_errors = [
    //   'usr_pwd' => [
    //        'validateUser' => 'incorrect password',
    //       'required' =>  'password required'
    //     ],
    //     'cd_email'    => [
    //       'required' =>  'email required',
    //       'valid_email' => 'strings.invalid_email'
    //     ]
    //];


}
