<?php
    /**
     * Created by PhpStorm.
     * User: kaso
     * Date: 11/15/2014
     * Time: 7:19 AM
     */

    namespace AppartmentManager\Commands\Tenant;


    use AppartmentManager\Commands\Command;
    use AppartmentManager\Events\TenantCreatesComplaint;
    use AppartmentManager\Repository\Tenant\ComplaintsRepository;

    class ComplaintsCommand implements Command
    {


        /**
         * @var ComplaintsRepository
         */
        private $complaintsRepository;

        function __construct(ComplaintsRepository $complaintsRepository)
        {
            $this->complaintsRepository = $complaintsRepository;
        }

        public function execute($data = [])
        {
            $complaint = $this->complaintsRepository->create($data);
            \Event::fire(TenantCreatesComplaint::class, compact('complaint'));
        }
    }