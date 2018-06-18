<?php
/**
 * Created by PhpStorm.
 * User: mbendandour
 * Date: 6/13/18
 * Time: 11:37 AM
 */

namespace App\Http\Requests;


class UserFormRequest
{

    public function authorize(){


        return true;

    }


    /**
     * @return array
     */


    public function rules(){

        return [

            'name' => 'required|string',
            'email' => 'required|email'

        ];

    }

    public function messages(){

        return [

            'name.required' => 'Place a name',
            'email.required' => 'Place an email'

        ];

    }



}