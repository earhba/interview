<?php
require './src/Interview.php';

use PHPUnit\Framework\TestCase;

class InterviewTest extends PHPUnit\Framework\TestCase {

    /** @test  */
    public function testReverseArray()
    {
        $data = "I want this job.";
        $interview = new Interview();
        $this->assertEquals(['job', 'this', 'want', 'I'],$interview->ReverseArray($data));
    }
    /** @test  */
    public function testOrderArray()
    {
        $data = ["200", "450", "2.5", "1", "505.5", "2"];
        
        $interview = new Interview();
        
        $this->assertTrue(1 === $interview->SortArray($data)[0]);
        $this->assertTrue(2 === $interview->SortArray($data)[1]);
        $this->assertTrue(2.5 === $interview->SortArray($data)[2]);
        $this->assertTrue(200 === $interview->SortArray($data)[3]);
        $this->assertTrue(450 === $interview->SortArray($data)[4]);
        $this->assertTrue(505.5 === $interview->SortArray($data)[5]);
    }
    /** @test  */
     public function testGetDiffArray()
    {
        $data1 = [1, 2, 3, 4, 5, 6, 7];
        $data2 = [2, 4, 5, 7, 8, 9, 10];
        
        $interview = new Interview();
        $data =$interview->GetDiffArray($data2,$data1);
        $this->assertEquals([8, 9, 10],$data);
        
        $interview = new Interview();
        $data =$interview->GetDiffArray($data1,$data2);
        $this->assertEquals([1, 3, 6], $data);
    }
    
    /** @test  */
    public function testGetDistance()
    {
        $place1 = ['lat' => '41.9641684', 'lon' => '-87.6859726'];
        $place2 = ['lat' => '42.1820210', 'lon' => '-88.3429465'];
        
        //Provided  lat's and lon's return 59.39 value for calculation 
        $interview = new Interview();
        $distance = $interview->GetDistance($place1,$place2);
        $this->assertEquals(59.39, $distance);
    }
    
   /** @test  */
    public function testGetHumanTimeDiff()
    {
        $time1 = "2016-06-05T12:00:00";
        $time2 = "2016-06-05T15:00:00";
 
        $interview = new Interview();
        $timeDiff = $interview->GetHumanTimeDiff($time1,$time2);
        $this->assertEquals("3 hours ago", $timeDiff);
    }


}
