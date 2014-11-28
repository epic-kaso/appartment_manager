<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 10:49 PM
     */

    namespace AppartmentManager\Notifications;


    class NotificationManager
    {

        private $basicMailTemplate = 'emails.basic';

        public function sendEmail($destinationEmail, $subject, $body, $from = NULL, $options = [])
        {

            try {
                \Mail::queue($this->basicMailTemplate, ['body' => $body],
                    function ($message) use ($destinationEmail, $subject, $from) {
                        $message->subject($subject)
                            ->to($destinationEmail)
                            ->from($from);
                    });
            } catch (\Exception $ex) {
                \Log::alert('Email Sending failed::' . $ex->getMessage());
            }

        }
    }