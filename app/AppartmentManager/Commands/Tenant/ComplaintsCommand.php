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
            $data['category_ids'] = $this->fetchCategoryIds($data);

            $complaint = $this->complaintsRepository->create(
                [
                    'category_ids'   => $data['category_ids'],
                    'complaint_body' => $data['complaint_body']
                ]);
            \Event::fire(TenantCreatesComplaint::class, ['complaint_id' => $complaint->id]);
        }

        private function fetchCategoryIds($data = [])
        {

            $array = array_where($data, function ($key, $value) {
                return str_contains($key, 'category');
            });

            return array_values($array);
        }
    }