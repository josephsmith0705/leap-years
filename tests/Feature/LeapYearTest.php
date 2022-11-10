<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LeapYearTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

    
    public function responseTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function validDivisibleBy400()
    {
        $this->checkLeapYear(2000, true);
    }

    /** @test */
    public function validDivisibleBy100()
    {
        $this->checkLeapYear(1700, false);
    }

    /** @test */
    public function validDivisibleBy4()
    {
        $this->checkLeapYear('2012', true);
    }

    /** @test */
    public function validNotDivisibleBy4()
    {
        $this->checkLeapYear('2000', false);
    }

    /** @test */
    public function invalidType()
    {
        $this->checkLeapYear(true, false, true);
    }

    /** @test */
    public function emptyYear()
    {
        $this->checkLeapYear(null, false, true);
    }

    /** @test */
    public function invalidYear()
    {
        $this->checkLeapYear(20125493.250, false, true);
    }

    private function checkLeapYear($year, $isLeapYear = false, $error = false)
    {
        $response = $this->post('/', [
            'year' => $year
        ]);

        if($error)
        {
            $response->assertSessionHasErrors([
                'year'
            ]);
        }
        else
        {
            $this->assertEquals($isLeapYear, $response['isLeapYear']);
        }
    }
}
