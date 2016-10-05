<?php

class ClientTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_listing_page()
    {
        $this->visit('/')
         ->click('List Clients')
         ->seePageIs('/listClients');
    }

    public function test_addcsv()
    {
        $this->visit('/')
            ->submitForm('submit', ['name'                    => 'Bikash Shrestha',
                                    'email'                   => 'warriorbik@me.com',
                                    'gender'                  => 'Male',
                                    'phone'                   => '9851195660',
                                    'address'                 => 'New Baneshwor, Kathmandu',
                                    'nationality'             => 'Nepalese',
                                    'year'                    => '1986',
                                    'month'                   => '5',
                                    'day'                     => '07',
                                    'education_name[0]'       => '+2',
                                    'education_passedyear[0]' => '2005',
                                    'mode_of_contact'         => 'Email',
                                    ])
            ->see('Client Added')
            ->seePageIs('/listClients');
    }
}
