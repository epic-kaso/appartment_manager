<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 1:00 PM
     */

    namespace AppartmentManager\EventListeners;


    use AppartmentManager\Events\AdminHandlesComplaint;
    use AppartmentManager\Events\TenantCreatesComplaint;
    use AppartmentManager\Models\Complaint;
    use AppartmentManager\Notifications\NotificationManager;
    use AppartmentManager\Repository\Admin\AdminRepository;

    class ComplaintsEventListener
    {


        /**
         * @var NotificationManager
         */
        private $notificationManager;
        /**
         * @var AdminRepository
         */
        private $adminRepository;

        function __construct(
            NotificationManager $notificationManager,
            AdminRepository $adminRepository
        )
        {
            $this->notificationManager = $notificationManager;
            $this->adminRepository = $adminRepository;
        }

        public function onTenantCreatesComplaint($complaint_id)
        {

            $complaint = Complaint::find($complaint_id);

            $message = "New Complaint from {$complaint->tenant->appartment->appartment_id} \n" .
                "'{$complaint->description}'";
            $r = $this->adminRepository->getAdminsForComplaint($complaint);

            if (!empty($r)) {
                foreach ($r as $a) {
                    $this->notificationManager->sendEmail($a->admin->email, 'New Complaint', $message, 'complaints@tenantmanger.com');
                }
            }

        }

        public function onAdminHandlesComplaint($complaint_id)
        {
            $complaint = Complaint::find($complaint_id);

            $message = "Your Complaint, '{$complaint->description}', has been taken care of.";

            $tenant = $complaint->tenant;

            $this->notificationManager->sendEmail($tenant->email, 'Complaint Response', $message, 'complaints@tenantmanger.com');
        }

        public function subscribe($events)
        {
            $events->listen(
                TenantCreatesComplaint::class,
                'AppartmentManager\EventListeners\ComplaintsEventListener@onTenantCreatesComplaint'
            );

            $events->listen(
                AdminHandlesComplaint::class,
                'AppartmentManager\EventListeners\ComplaintsEventListener@onAdminHandlesComplaint'
            );
        }
    }