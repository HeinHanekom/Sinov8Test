<?php

namespace Tests\Feature;

use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ContactsTest extends TestCase
{

    /** @test */
    public function get_all_contacts_from_database()
    {

        $this->withoutExceptionHandling();
        $this->get('Get-All-Contacts')->assertStatus(200);

        $contacts = Contact::all()->count();

        $this->assertTrue($contacts === 50);
    }

    /** @test */
    public function store_new_contact()
    {

        $data = factory(Contact::class)->raw(['email' => 'test123@mailinator.net', 'first_name' => 'Walter', 'last_name' => 'Bishop']);
        $this->withoutExceptionHandling();
        $this->post('contacts/save-this-contact', $data)->assertStatus(200);
        $this->assertDatabaseHas('contacts', ['email' => 'test123@mailinator.net']);

    }


}
