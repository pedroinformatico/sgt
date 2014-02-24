<?php
/**
 * GenericMail
 *
 * class for quick and easy mailuse
 *
 * With this class you can easy send Mails to any amount of persons.
 * Text and HTML Mails can be send by proper settings. As well attachments
 * can be served as well.
 * This class is based on PEAR/Mail System. For more informations see http://pear.php.net
 * You'll need from PEAR 2 packages:
 *  - Mail_mime  http://pear.php.net/package/Mail_Mime
 *  - Mail       http://pear.php.net/package/Mail
 *
 * This class can be used free without any limitations expect the PEAR licence.
 *
 * @package     _core
 * @subpackage  altavoz
 * @author Peter Valicek <Peter.Valicek@GMX.COM> / YCC
 * @version
 * 1.0.0 - 15/02/2004 - Peter.Valicek - Primera version<br>
 * 1.1.0 - 06/02/2009 - YCC - Ajustes y homologacion para lib Altavoz<br>
 * 1.1.1 - 18/03/2009 - YCC - Agrega funcion encodeAddress, para encodif. la parte del nombre en las
 * 1.2.0 - 24/03/2011 - GPB - Agrega parametros para envio de contenido en UTF-8
 * direcciones de email con tildes y caracteres especiales
 *
 *
 *
 * Following shows an quick example
 *
 * <code>
 * $sender = 'Superuser <testuser@example.com>';
 * $recipient = array(
 *          'to'            => 'You <you@example.com>'
 *            ['reply-to'        => 'Me <me@example.com>'] ## optional
 *            ['return-path'    => 'Me <me@example.com>'] ## optional
 *          ['cc'              => 'He <he@example.com>',] ## optional
 *          ['bcc'             => 'She <she@example.com>'] ## optional
 *          ['precedence'   => 'normal'] ## optional
 * );
 * $data = array(
 *          'subject'       => 'This is a testmail',
 *          'textdata'      => 'A continuacion un bonito mail.',
 *          'htmldata'      => '<b>hallo das ist ein Test</b>',
 *            ['attachment'    => array('/tmp/testfile.txt')] ##optional
 * );
 * try {
 *     GenericMail::sendmail( $sender, $recipient, $data );
 * } catch (Exception $e) {
 *     echo 'Error en el envio del mail:' . $e->getMessage();
 * };
 *</code>
 */
class GenericMail {

    /**
     * Instance on PEAR::Mail_Mime
     *
     * @link http://pear.php.net/packages/Mail_Mime
     * @access private
     * @return object mailObject
     */
    function _instanceMailMime() {

        require_once 'Mail/mime.php';

        /*
         * linefeed
         */
        $crfl = "\r\n";

        $mime_obj = new Mail_mime( $crfl );

        if (is_object($mime_obj))
            return $mime_obj;
    }

    /**
     * _instanceMail()
     * Instance of Mail
     * @access private
     * @param $smtp string host desde el cual enviar correos
     * @return object $mail
     */
    function _instanceMail($smtp) {

        require_once 'Mail.php';

/*
        $params = array(
                        'sendmail_path' => '/usr/lib/sendmail',
                        'host'            => 'localhost'
                        );

        $mail_obj = Mail::factory('sendmail', $params);
*/
        // seteo del smtp
        $params = array(
                        'host'            => $smtp
                        );

        $mail_obj = Mail::factory('smtp', $params);

        return $mail_obj;
    }

    /**
     * _constructHeader()
     * Construct Header of the Mail.
     *
     * @access private
     * @param string $sender Mailsender
     * @param array $recipient Recipient Data
     * @param string $subject Mail subject
     * @return array HeaderArray and recipientlist
     */
    function _constructHeader( $sender, $recipient, $subject ) {

        $recipient['to'] = GenericMail::encodeAddress($recipient['to']);
        $recipient_list = $recipient['to'];

        /*
         * Set Mailsernde ( From )
         * Set Recipient ( To )
         * Set Mailsubject ( Subject )
         */

        $sender = GenericMail::encodeAddress($sender);

        $header = array(
                        'From'            => $sender,
                        'To'            => $recipient['to'],
                        'Subject'        => $subject
                        );

        /*
         * if provided, set Reply-To Address
         */
        if (isset($recipient['reply-to']) && $recipient['reply-to'] != '')
            $header['Reply-To'] = GenericMail::encodeAddress($recipient['reply-to']);

        /*
         * if provided, set Return-Path Address
         */
        if (isset($recipient['return-path']) && $recipient['return-path'] != '')
            $header['Return-Path'] = GenericMail::encodeAddress($recipient['return-path']);

        /*
         * if provided, set Carbon Copy Address
         */
        if (isset($recipient['cc']) && $recipient['cc'] != '') {
            $header['Cc'] = GenericMail::encodeAddress($recipient['cc']);
            $recipient_list .= ', ' . $header['Cc'];
        }

        /*
         * if provided, set Blind Carbon Copy Address
         */
        if (isset($recipient['bcc']) && $recipient['bcc'] != '') {
            $header['Bcc'] = GenericMail::encodeAddress($recipient['bcc']);
            $recipient_list .= ', '.$header['Bcc'];
        }

        /*
         * if provided, set Precedence Header
         */
        if (isset($recipient['precedence']) && $recipient['precedence'] != '') {
            $header['Precedence'] = $recipient['precedence'];
        } else {
            $header['Precedence'] = 'normal';
        }

        $return = array('headers' => $header, 'recipient_list' => $recipient_list);

        if (is_array($return)) {
            return $return;
        }
    }



    /**
     * sendmail()
     *
     * This will finally send the Email to Recipient
     * @access public
     * @param string $sender [ email ]
     * @param array $recipient [ to | cc | bcc | precedence ]
     * @param array $data [ subject | textdata | htmldata | attachment ]
     * @return bool
     */
    function sendmail($sender, $recipient, $data, $smtp = 'localhost' ) {

        /*
         * Get mime object
         */
        $mime = GenericMail::_instanceMailMime();

        /*
         * Get Headerdata
         */
        $headers = GenericMail::_constructHeader($sender, $recipient, $data['subject']);

        /*
         * Check if there are attachments
         */
        if (isset($data['attachment'])) {
            $attachment = $data['attachment'];
            if (is_array($attachment)) {
                foreach ($attachment as $file) {
                    if (is_file($file) && is_readable($file)) {
                        $mime->addAttachment($file);
                    }
                }
            } else {
                if (is_file($attachment) && is_readable($attachment)) {
                    $mime->addAttachment($attachment);
                }
            }
        }

        /*
         * Setea porciones texto y html del correo
         */
        if (!empty($data['textdata'])) $mime->setTxtbody($data['textdata']);

        if (!empty($data['htmldata'])) $mime->setHTMLbody($data['htmldata']);

        // mail puede contener 'textdata' y/o 'htmldata'
        $param['text_charset'] = 'utf-8'; // The character set to use for the plain text part of the email. Default is "iso-8859-1".
        $param['html_charset'] = 'utf-8'; // The character set to use for the HTML part of the email. Default is "iso-8859-1".


        /*
         * Create Body of the Mail
         */
        $body = $mime->get($param); // http://pear.php.net/manual/en/package.mail.mail-mime.get.php

        /*
         * Set correct Headers
         */
        $hdrs = $mime->headers($headers['headers']);

        /*
         * Get Mail Object
         */
        $mail_object = GenericMail::_instanceMail($smtp);

        /*
         * Send Mail
         */
        $res = $mail_object->send( $headers['recipient_list'], $hdrs, $body );
        if (PEAR::isError($res)) {
            throw new Exception("code='" .
                                  $res->getCode() . "', message='" .
                                  $res->getMessage() . "'.");
        };

    }


    /**
     * encodeAddress()
     * Codifica con mime una casilla de correo, en caso que traiga caracteres especiales.
     *
     * @access public
     * @param string $casilla la casilla de correo a codificar
     * @return string casilla codificada-mime
     */
    public function encodeAddress($casilla) {

        $casilla = trim($casilla);
        // Si la casilla no trae name, no le hace nada
        if (preg_match('/^<?[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}>?$/', $casilla)) {
            return $casilla;
        };

        // Si trae name, ve si hay que encodificarlo
        $matches = array();
        if (preg_match('/(.+)(<[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}>)$/', $casilla, $matches)) {
            $name = $matches[1];
            $email = $matches[2];

            // Si el nombre tiene tildes o ()<>@,;\:". lo encodifica
            if (preg_match('/([\x80-\xFF\(\)\<\>\@\,\;\\\:\"\.]){1}/', $name)) {
                $preferences = array(
                    'input-charset' => 'UTF-8',
                    'output-charset' => 'UTF-8', // ISO-8859-1 o UTF-8
                    'line-length' => 255,
                    'scheme' => 'B', // o Q
                    'line-break-chars' => "\n"
                );
                $name = iconv_mime_encode('Reply-to', $name, $preferences);
                $name = preg_replace("#^Reply-to\:\ #", '', $name);
                $casilla = $name . $email;
            };
        };
        return $casilla;
    }

}

?>