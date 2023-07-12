<?php

App::uses('HttpSocket', 'Network/Http');
App::uses('String', 'Utility');

class FhirShell extends AppShell
{
    public $uses = array('Drugs');

    public function main()
    {
        //Get max id in our current table
        $drugs = $this->Drugs->find('all', array(
            'contain' => false,
            'order' => array('Drugs.id' => 'desc')
            //  ,'limit' => 10
        ));

        foreach ($drugs as $drug) {
            // $this->out('Hello world.'.$drug['Drugs']['id']);
            $uuid = String::uuid();
            $manu = String::uuid();
            $know = String::uuid();
            $contained_array = array(
                array(
                    'resourceType' => 'Organization',
                    'id' => $manu,
                    'name' =>  $drug['Drugs']['manufacturer']
                ),
                array(
                    'resourceType' => 'MedicationKnowledge',
                    'id' => $know,
                    'name' => $drug['Drugs']['brand_name']
                )
            );

            $payload = [
                'resourceType' => 'Medication',
                'id' => $uuid,
                'identifier' => '',
                'code' => '',
                'status' => 'active',
                'contained' => json_encode($contained_array),

                'marketingAuthorizationHolder' => array(
                    'reference' => $manu
                ),
                'doseForm' => '',
                'totalVolume' => '',
                'ingredient' => '',
                'batch' => array(
                    'lotNumber' => $drug['Drugs']['batch_number']
                ),
                'definition' => array(
                    'reference' => $know
                )
            ];

            $HttpSocket = new HttpSocket(
                ['ssl_verify_peer' => false, 'ssl_verify_host' => false, 'ssl_verify_peer_name' => false,]
            );

            $results = $HttpSocket->put(
                'http://45.79.161.190:8085/fhir/Medication/' . $uuid,
                json_encode($payload),
                array('header' => array(
                    'Content-Type' => 'application/json',
                    'umc-client-key' => '5ab835c4-3179-4590-bcd2-ff3c27d6b8ff'
                ))
            );

            if ($results->isOk()) {
                $this->out('got payload');
                $data = json_decode($results->body, true);
                // $this->out($data);
            } else {
                $this->out('Unable to save!!');
                $this->out($results->body);
            }
        }
    }
}
