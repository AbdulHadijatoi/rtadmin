<?php

namespace App\Helpers;

class ErrorHelper
{
    public static function displayErrors($errors)
    {
        $errorHtml = '';

        // Display session errors
        if (session('error')) {
            $errorHtml .= '<div class="alert alert-danger">' . session('error') . '</div>';
        }

        // Display session success messages
        if (session('success')) {
            $errorHtml .= '<div class="alert alert-success">' . session('success') . '</div>';
        }

        // Display validation errors, if any
        if ($errors->any()) {
            $errorHtml .= '<div class="alert alert-danger">';
            $errorHtml .= '<ul>';
            foreach ($errors->all() as $error) {
                $errorHtml .= '<li>' . $error . '</li>';
            }
            $errorHtml .= '</ul>';
            $errorHtml .= '</div>';
        }

        return $errorHtml;
    }
}